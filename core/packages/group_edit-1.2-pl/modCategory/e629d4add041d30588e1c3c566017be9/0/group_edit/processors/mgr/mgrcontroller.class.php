<?php

class TvPropertiesManagerController extends modManagerController {
    public $loadFooter = false;
    public $loadHeader = false;
    public function checkPermissions() {
        return $this->modx->hasPermission('view_tv');
    }
    public function loadCustomCssJs() {}
    public function process(array $scriptProperties = array()) {}
    public function getPageTitle() {return '';}
    public function getTemplateFile() {
        return 'empty.tpl';
    }
    
    public function getRuleOutput(){
        return isset($this->ruleOutput) ? $this->ruleOutput : '';
    }
    
    public function getLanguageTopics() {return array();}
    
    public function checkFormCustomizationRules(&$obj = null,$forParent = false) {
        $overridden = array();

        $userGroups = $this->modx->user->getUserGroups();
        $c = $this->modx->newQuery('modActionDom');
        $c->innerJoin('modFormCustomizationSet','FCSet');
        $c->innerJoin('modFormCustomizationProfile','Profile','FCSet.profile = Profile.id');
        $c->leftJoin('modFormCustomizationProfileUserGroup','ProfileUserGroup','Profile.id = ProfileUserGroup.profile');
        $c->leftJoin('modFormCustomizationProfile','UGProfile','UGProfile.id = ProfileUserGroup.profile');
        $c->where(array(
            'modActionDom.action' => array_key_exists('id',$this->config) ? $this->config['id'] : 0,
            'modActionDom.for_parent' => $forParent,
            'FCSet.active' => true,
            'Profile.active' => true,
        ));
        if (!empty($userGroups)) {
            $c->where(array(
                array(
                    'ProfileUserGroup.usergroup:IN' => $userGroups,
                    array(
                        'OR:ProfileUserGroup.usergroup:IS' => null,
                        'AND:UGProfile.active:=' => true,
                    ),
                ),
                'OR:ProfileUserGroup.usergroup:=' => null,
            ),xPDOQuery::SQL_AND,null,2);
        }
        $c->select($this->modx->getSelectColumns('modActionDom', 'modActionDom'));
        $c->select($this->modx->getSelectColumns('modFormCustomizationSet', 'FCSet', '', array(
            'constraint_class',
            'constraint_field',
            'constraint',
            'template'
        )));
        $c->sortby('modActionDom.rank','ASC');
        $domRules = $this->modx->getCollection('modActionDom',$c);
        $rules = array();
        /** @var modActionDom $rule */
        foreach ($domRules as $rule) {
            $template = $rule->get('template');
            if (!empty($template) && $obj) {
                if ($template != $obj->get('template')) continue;
            }
            $constraintClass = $rule->get('constraint_class');
            if (!empty($constraintClass)) {
                if (empty($obj) || !($obj instanceof $constraintClass)) continue;
                $constraintField = $rule->get('constraint_field');
                $constraint = $rule->get('constraint');
                if ($obj->get($constraintField) != $constraint) {
                    continue;
                }
            }
            if ($rule->get('rule') == 'fieldDefault') {
                $field = $rule->get('name');
                if ($field == 'modx-resource-content') $field = 'content';
                $overridden[$field] = $rule->get('value');
                if ($field == 'parent-cmb') {
                    $overridden['parent'] = (int)$rule->get('value');
                    $overridden['parent-cmb'] = (int)$rule->get('value');
                }
            }
            $r = $rule->apply();
            if (!empty($r)) $rules[] = $r;
        }
        if (!empty($rules)) {
            $this->ruleOutput[] = '<script type="text/javascript">'.implode("\n",$rules).'</script>'; //'<script type="text/javascript">Ext.onReady(function() {'.implode("\n",$rules).'});</script>';
        }
        return $overridden;
    }
    
}
