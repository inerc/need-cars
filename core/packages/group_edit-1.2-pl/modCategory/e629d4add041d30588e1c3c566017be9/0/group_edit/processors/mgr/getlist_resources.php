<?php

/**
 * Get a list of resources
 *
 * @package group_edit
 * @subpackage processors
 */

/* setup default properties */
$isLimit = !empty($_REQUEST['limit']);
$start = $modx->getOption('start',$_REQUEST,0);
$limit = $modx->getOption('limit',$_REQUEST,20);
$sort = $modx->getOption('sort',$_REQUEST,'menuindex');
$dir = $modx->getOption('dir',$_REQUEST,'ASC');
$query = $modx->getOption('query',$_REQUEST,'');

$lang = $modx->getOption('manager_language',null,'ru');
$modx->lexicon->load($lang.':group_edit:default');

//Настройки
$params_type = $modx->getOption('type',$_REQUEST,'');
$menu = $modx->getObject('modMenu',array('action'=>$modx->getOption('a',$_REQUEST,0),'params'=>($params_type ? '&type='.$params_type : '')));
$groupEdit_config = array();
$groupEdit_config['parent_name'] = $menu->get('text');
$groupEdit_config['parent_id'] = '0';
$groupEdit_config['parent_context'] = 'web';
$groupEdit_config['hide_children_in_tree'] = $modx->getOption('group_edit.hide_children_in_tree',null,true);
$groupEdit_config['fields'] = array();
if(!empty($modx->config['group_edit.parent_name'])){
    $parent_name_arr = explode(',',$modx->config['group_edit.parent_name']);
    foreach($parent_name_arr as $key => $val){
        if(trim($val) == $menu->get('text') || count($parent_name_arr)==1){
            $category_id_arr = explode(',',str_replace(' ','',$modx->config['group_edit.parent_id']));
            $category_context_arr = explode(',',str_replace(' ','',$modx->config['group_edit.parent_context']));
            $fields_arr = explode('||',str_replace(' ','',$modx->config['group_edit.fields']));
            $groupEdit_config['parent_id'] = isset($category_id_arr[$key]) ? $category_id_arr[$key] : $category_id_arr[0];
            $groupEdit_config['parent_context'] = isset($category_context_arr[$key]) ? $category_context_arr[$key] : $category_context_arr[0];
            $temp_arr = isset($fields_arr[$key]) ? explode(',',$fields_arr[$key]) : explode(',',$fields_arr[0]);
            foreach($temp_arr as $k => $v){
                if(is_numeric($v)){
                    $tv = $modx->getObject('modTemplateVar',array('id'=>$v));
                    $groupEdit_config['fields']['tv'.$v] = !empty($tv) ? $tv->get('caption') : '';
                }else{
                    $groupEdit_config['fields'][$v] = $modx->lexicon('group_edit.'.$v)!='group_edit.'.$v ? $modx->lexicon('group_edit.'.$v) : $modx->lexicon($v);
                }
            }
            unset($temp_arr,$k,$v);
            break;
        }
    }
    unset($key,$val);
}

$modx->switchContext($groupEdit_config['parent_context']);

//echo '<pre>'.print_r($groupEdit_config).'</pre>';

$categoryId = $modx->getOption('categoryId',$_REQUEST,$groupEdit_config['parent_id']);

//делаем чтобы дочерние документы не показывались в дереве документов
if($groupEdit_config['parent_id']!=0){
    $parent = $modx->getObject('modResource',$categoryId);
    if($groupEdit_config['parent_id'] == $categoryId && $parent->get('hide_children_in_tree') != $groupEdit_config['hide_children_in_tree']){
        $parent->set('hide_children_in_tree', ($groupEdit_config['hide_children_in_tree'] ? 1 : 0));
        $parent->save();
        //в 2.2 эта функция глючит
        //$affected = $modx->updateCollection('modResource', array("show_in_tree" => ($groupEdit_config['hide_children_in_tree'] ? 0 : 1)), array("parent:=" => $categoryId));
        //делаем по-другому
        //$childrens = $modx->getCollection('modResource', array("parent:=" => $categoryId));
        //if($childrens){
        //    foreach($childrens as $child) {
        //        $child->set('show_in_tree', ($groupEdit_config['hide_children_in_tree'] ? 0 : 1));
        //        $child->save();
        //    }
        //}
    }
}

/* query */
$c = $modx->newQuery('modResource');
$select = "
    `modResource`.*
";

/*
if(count($groupEdit_config['fields'])){
    foreach($groupEdit_config['fields'] as $key => $val){
        if(substr($key,0,2)=='tv'){
            $tv_id = substr($key,2);
            $select .= "
                ,(IFNULL((SELECT `tvc`.`value` FROM ".$modx->getTableName('modTemplateVarResource')." `tvc` WHERE `tvc`.`tmplvarid` = '{$tv_id}' AND `tvc`.`contentid` = `modResource`.`id` LIMIT 1),'')) AS `tv{$tv_id}`
            ";
        }
    }
    unset($key,$val,$tv_id);
}
*/

$c->select($select);
$where = array();
$where[] = array(
    'modResource.parent' => $categoryId
);
if (!empty($query)) {
    $where[]['modResource.pagetitle:LIKE'] = '%'.$query.'%';
}
$where[] = array(
    'modResource.context_key' => $groupEdit_config['parent_context']
);

$c->where($where);

$count = $modx->getCount('modResource',$c);
$c->sortby("`{$sort}`", $dir);
if ($isLimit) $c->limit($limit,$start);
$products = $modx->getCollection('modResource', $c);

//var_dump($count);
//print_r($where);
//echo $c->toSQL();

/* iterate */
$list = array();
$userIds = array();
$tvs = array();
foreach ($products as $product) {
    $productArray = $product->toArray();
    
    $productArray['itemClass'] = $productArray['isfolder'] ? 'group_edit_category' : 'group_edit_resource';
    if($productArray['deleted']) $productArray['itemClass'] .= ' group_edit_deleted';
    if(!$productArray['published']) $productArray['itemClass'] .=' group_edit_unpublished';
    
    foreach($groupEdit_config['fields'] as $key => $val){
        if(substr($key,0,2)=='tv'){
            $tv_id = substr($key,2);
            $tv = $modx->getObject('modTemplateVar',array('id'=>$tv_id));
            $productArray[$key] = $tv->getValue($productArray['id']);//$tv->renderOutput($productArray['id']);
            $productArray[$key] = $tv->prepareOutput($productArray[$key]);
        }
    }
    
    $list[] = $productArray;
}

return $this->outputArray($list,$count);
