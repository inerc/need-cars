<?php

/**
 * Loads the home page.
 * 
 * @package group_edit
 * @subpackage controllers
 */

class Group_EditMgrHomeManagerController extends groupEditBaseManagerController {
    
    public function process(array $scriptProperties = array()) {
        
        $this->config['templatesPath'] = MODX_CORE_PATH.'components/group_edit/templates/';
        $this->config['jsUrl'] = $this->modx->getOption('assets_url').'components/group_edit/js/mgr/';
        $this->config['cssUrl'] = $this->modx->getOption('assets_url').'components/group_edit/css/';
        
        //$lang = $this->modx->getOption('manager_language',null,'ru');
        //$this->modx->lexicon->load($lang.':group_edit:default');
        
        //Настройки
        $menu = $this->modx->getObject('modMenu',array('action'=>$_GET['a']));
        $groupEdit_config = array();
        $groupEdit_config['parent_name'] = $menu->get('text');
        $groupEdit_config['parent_id'] = '0';
        $groupEdit_config['context_key'] = $this->modx->getOption('default_context',null,'web');
        $groupEdit_config['fields'] = array();
        $mod_type = isset($_GET['type']) && is_numeric($_GET['type']) ? $_GET['type'] : 1;
        
        if(!empty($this->modx->config['group_edit.parent_name'])){
            
            $parent_name_arr = explode(',',$this->modx->config['group_edit.parent_name']);
            $settings_index = $mod_type-1;
            $groupEdit_config['parent_name'] = $parent_name_arr[$settings_index];
            
            $groupEdit_config['parent_name'] = $parent_name_arr[$settings_index];
            $category_id_arr = explode(',',str_replace(' ','',$this->modx->config['group_edit.parent_id']));
            $category_context_arr = explode(',',str_replace(' ','',$this->modx->config['group_edit.parent_context']));
            $fields_arr = explode('||',str_replace(' ','',$this->modx->config['group_edit.fields']));
            $groupEdit_config['parent_id'] = isset($category_id_arr[$settings_index]) ? $category_id_arr[$settings_index] : $category_id_arr[0];
            $groupEdit_config['context_key'] = isset($category_context_arr[$settings_index]) ? $category_context_arr[$settings_index] : $category_context_arr[0];
            $temp_arr = isset($fields_arr[$settings_index]) ? explode(',',$fields_arr[$settings_index]) : explode(',',$fields_arr[0]);
            $groupEdit_config['fields'] = array();
            foreach($temp_arr as $k => $v){
                if(is_numeric($v)){
                    $tv = $this->modx->getObject('modTemplateVar',array('id'=>$v));
                    $groupEdit_config['fields']['tv'.$v] = !empty($tv) ? array($tv->get('caption'),$tv->get('type')) : array('','');
                }else{
                    $groupEdit_config['fields'][$v] = $this->modx->lexicon('group_edit.'.$v)!='group_edit.'.$v ? array($this->modx->lexicon('group_edit.'.$v),'') : array($this->modx->lexicon($v),'');
                }
            }
            unset($temp_arr,$k,$v);
            
        }
        
        $this->addHtml('<script type="text/javascript">
        grEdit.config = '.$this->modx->toJSON(array('modName'=>$groupEdit_config['parent_name'],'topParentId'=>intval($groupEdit_config['parent_id']),'hide_children_in_tree'=>$this->modx->config['group_edit.hide_children_in_tree']==true)).';
        grEdit.config.new_res = 0;
        grEdit.config.connector_url = "'.$this->modx->getOption('assets_url').'components/group_edit/connector.php";
        grEdit.config.parentId = "'.$groupEdit_config['parent_id'].'";
        grEdit.config.fields = '.(count($groupEdit_config['fields'])>0 ? $this->modx->toJSON($groupEdit_config['fields']) : '{}').';
        grEdit.config.context = "'.$groupEdit_config['context_key'].'";
        grEdit.request = {"a":"'.$_GET['a'].'","type":"'.(isset($_GET['type']) ? $_GET['type'] : '').'"};
        MODx.config.publish_document = true;
        </script>');
        
        $context = $this->modx->getObject('modContext','mgr');
        if (!$context) { return $this->modx->error->failure($this->modx->lexicon('context_err_nf')); }
        $context->prepare();
        
        /* Set which RTE */
        if ($context->getOption('use_editor', false, $this->modx->_userConfig)) {
            $rte = $context->getOption('which_editor', '', $this->modx->_userConfig);
            /* invoke OnRichTextEditorRegister event */
            $text_editors = $this->modx->invokeEvent('OnRichTextEditorRegister');
            $replace_richtexteditor = array();//array('ta');
        
            /* invoke OnRichTextEditorInit event */
            $onRichTextEditorInit = $this->modx->invokeEvent('OnRichTextEditorInit',array(
                'editor' => $rte,
                'elements' => $replace_richtexteditor,
                'id' => 0,
                'mode' => modSystemEvent::MODE_NEW//MODE_UPD
            ));
        }
        
    }
    
    public function getPageTitle() {
        return $this->modx->lexicon('group_edit');
    }
    
    public function loadCustomCssJs() {
        
        $this->addJavascript($this->config['jsUrl'].'group_edit.js');
        $this->addCss($this->config['cssUrl'].'mgr.css');
        
        $this->addJavascript($this->config['jsUrl'].'widgets/resources.grid.js');
        $this->addJavascript($this->config['jsUrl'].'widgets/home.panel.js');
        $this->addJavascript($this->config['jsUrl'].'widgets/modx.panel.resource.js');
        $this->addJavascript($this->config['jsUrl'].'sections/index.js');
        
        $this->addJavascript($this->modx->getOption('manager_url').'assets/modext/util/datetime.js');
        $this->addJavascript($this->modx->getOption('manager_url').'assets/modext/widgets/element/modx.panel.tv.renders.js');
        $this->addJavascript($this->modx->getOption('manager_url').'assets/modext/widgets/resource/modx.grid.resource.security.local.js');
        $this->addJavascript($this->modx->getOption('manager_url').'assets/modext/widgets/resource/modx.panel.resource.tv.js');
        $this->addJavascript($this->modx->getOption('manager_url').'assets/modext/sections/resource/update.js');
        $this->addJavascript($this->modx->getOption('manager_url').'assets/modext/sections/resource/create.js');
        
    }
    
    public function getTemplateFile() {
        return $this->config['templatesPath'].'home.tpl';
    }
    
}

