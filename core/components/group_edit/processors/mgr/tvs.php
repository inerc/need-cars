<?php

/**
 * Retrieves a resource TV by its ID.
 *
 * @param integer $id The ID of the resource to grab
 * @return modResource
 *
 * @package group_edit
 * @subpackage processors.resource
 */

$processorsPath = MODX_CORE_PATH.'components/group_edit/processors/mgr/';

$modx->lexicon->load('resource');
//if (empty($scriptProperties['id']) && empty($scriptProperties['parent'])) return $modx->error->failure($modx->lexicon('resource_err_ns'));

$ident = $modx->getOption('ident',$scriptProperties,0);

if(!empty($scriptProperties['id'])){
    
    $resource = $modx->getObject('modResource', $scriptProperties['id']);
    if (empty($resource)) return $modx->error->failure($modx->lexicon('resource_err_nfs',array('id' => $scriptProperties['id'])));
    if (!$resource->checkPolicy('view')) return $modx->error->failure($modx->lexicon('permission_denied'));

}else{
    
    $resource = $modx->newObject('modResource');
    $default_template = $modx->getOption('template',$scriptProperties,0);
    //если нет шаблона по умолчанию, берум от родителя
    if(!$default_template && isset($scriptProperties['parent'])){
        $parent = $modx->getObject('modResource',$scriptProperties['parent']);
        $default_template = $parent != null ? $parent->get('template') : $context->getOption('default_template', 0, $modx->_userConfig);
    }
    $resource->set('template',$default_template);
    $resource->set('class_key',$modx->getOption('class_key',$scriptProperties,'modDocument'));
    $resource->set('context_key',$modx->getOption('class_key',$scriptProperties,'web'));
    
}

$record = $resource->toArray();

if (!isset($this->smarty)) {
    $modx->getService('smarty', 'smarty.modSmarty', '', array(
        'template_dir' => $modx->getOption('manager_path') . 'templates/' . $modx->getOption('manager_theme',null,'default') . '/',
    ));
}


/* simulate controller to allow controller methods in TV Input Properties controllers */
$modx->getService('smarty', 'smarty.modSmarty','');
require_once MODX_CORE_PATH.'model/modx/modmanagercontroller.class.php';
require_once $processorsPath.'mgrcontroller.class.php';

$c = new TvPropertiesManagerController($this->modx);
$modx->controller = call_user_func_array(array($c,'getInstance'),array($this->modx,'TvPropertiesManagerController'));
//$modx->controller->render();

/* get TVs */
$templateId = $record['template'];
$tvCounts = array();
$tvOutput = include dirname(__FILE__).'/resource_tvs.php';

//чтобы не копировать весь код и шаблоны, заменяем отдельные строки чтобы заставить работать некоторые типы ввода TV
$res_id = isset($record['id']) ? $record['id'] : 0;
$tv_values = array();
$replace_id = $res_id ? $res_id : $ident;

$modx->controller->config['id'] = $resource->get('id') ? 30 : 55;
$overridden = $modx->controller->checkFormCustomizationRules($resource);
$customForms = $modx->controller->getRuleOutput();
if(!empty($customForms[0])) $tvOutput .= $customForms[0];

//MIGX
$migx = '';
//if(strpos($tvOutput,'MODx.grid.multiTVgrid')!==false){
//    $temp_arr = preg_split('/(<!-- multiItemsGridTv -->|<!-- \/multiItemsGridTv -->)/s', $tvOutput);
//    if(count($temp_arr)==3){
//        $migx = $temp_arr[1];
//        $tvOutput = $temp_arr[0].$temp_arr[2];
//    }
//}

//обрабатываем чтобы можно было открыть несколько документов одновременно
$patterns = array(
    0 => "/(id=\"tv)([^\"]+)(\")/",
    1 => "/'(tv)([^\'\]]+)'/",
    2 => "/modx-panel-resource/",
    3 => "/id=\"modx-tv-tabs\"/",
    4 => "/'modx-panel-tv-image'/",
    5 => "/(\"modx-resource-)([^\"]+)(\")/",
    6 => "/(>Ext\.onReady\(function\(\) \{)([^<]+)(\}\);<)/",
    7 => "/(Ext\.onReady\(function\(\) \{)|(\n\}\);)/"
);

$replacements = array(
    0 => "$1$2_{$replace_id}$3",
    1 => "'$1$2_{$replace_id}'",
    2 => "modx-panel-resource{$replace_id}",
    3 => "id=\"modx-tv-tabs_{$replace_id}\"",
    4 => "'group_edit_modx-panel-tv-image', res_id: '{$replace_id}'",
    5 => "$1\${2}{$replace_id}$3",
    6 => ">$2<",
    7 => ""
);

$tvOutput = preg_replace($patterns, $replacements, $tvOutput);
$tvOutput .= $migx;

if(isset($tvs) && is_array($tvs)){
    foreach ($tvs as $tv) {
        if($tv->get('type')=='image'){
            $tv_id = $tv->get('id');
            $tv_values[$tv->get('id')] = $tv->get('value');
            //$tvOutput = preg_replace("/(id=\"tv)(\D*)(\d+)/","$1$2$3_{$replace_id}",$tvOutput);
        }
    }
}

if (!empty($tvCounts)) {
    return $modx->error->success('',array('tv_values'=>$tv_values,'data'=>$tvOutput,'template'=>$resource->get('template')));
}else{
    return $modx->error->success('',array('tv_values'=>array(),'data'=>'','template'=>$resource->get('template')));
}


?>