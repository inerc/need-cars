<?php /* Smarty version Smarty-3.0.4, created on 2016-04-07 13:36:11
         compiled from "/home/f/fanclo/need-cars.ru/public_html/_webmanager/templates/default/element/tv/renders/input/file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12626061885706381b141aa1-18599767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b06e050afb3153101651f7885da294eb26845e0' => 
    array (
      0 => '/home/f/fanclo/need-cars.ru/public_html/_webmanager/templates/default/element/tv/renders/input/file.tpl',
      1 => 1459973753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12626061885706381b141aa1-18599767',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/f/fanclo/need-cars.ru/public_html/core/model/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_replace')) include '/home/f/fanclo/need-cars.ru/public_html/core/model/smarty/plugins/modifier.replace.php';
?><div id="tvbrowser<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
"></div>
<div id="tvpanel<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
"></div>

<?php if ($_smarty_tpl->getVariable('disabled')->value){?>
<script type="text/javascript">
// <![CDATA[

Ext.onReady(function() {
    var fld<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
 = MODx.load({
    
        xtype: 'displayfield'
        ,tv: '<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,renderTo: 'tvpanel<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,value: '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->value);?>
'
        ,width: 400
        ,msgTarget: 'under'
    
    });
});

// ]]>
</script>
<?php }else{ ?>
<script type="text/javascript">
// <![CDATA[

Ext.onReady(function() {
    var fld<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
 = MODx.load({
    
        xtype: 'modx-panel-tv-file'
        ,renderTo: 'tvpanel<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,tv: '<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,value: '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->value);?>
'
        ,relativeValue: '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->value);?>
'
        ,width: 400
        ,msgTarget: 'under'
        ,allowBlank: <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)==1||(isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)=='true'){?>true<?php }else{ ?>false<?php }?>
        ,source: '<?php echo $_smarty_tpl->getVariable('source')->value;?>
'

        <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowedFileTypes']) ? $_smarty_tpl->getVariable('params')->value['allowedFileTypes'] : null)){?>,allowedFileTypes: '<?php echo (isset($_smarty_tpl->getVariable('params')->value['allowedFileTypes']) ? $_smarty_tpl->getVariable('params')->value['allowedFileTypes'] : null);?>
'<?php }?>
        ,wctx: '<?php if ((isset($_smarty_tpl->getVariable('params')->value['wctx']) ? $_smarty_tpl->getVariable('params')->value['wctx'] : null)){?><?php echo (isset($_smarty_tpl->getVariable('params')->value['wctx']) ? $_smarty_tpl->getVariable('params')->value['wctx'] : null);?>
<?php }else{ ?>web<?php }?>'
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['openTo']) ? $_smarty_tpl->getVariable('params')->value['openTo'] : null)){?>,openTo: '<?php echo smarty_modifier_replace((isset($_smarty_tpl->getVariable('params')->value['openTo']) ? $_smarty_tpl->getVariable('params')->value['openTo'] : null),"'","\\'");?>
'<?php }?>

    
        ,listeners: { 'select': { fn:MODx.fireResourceFormChange, scope:this}}
    });
    MODx.makeDroppable(Ext.get('tvpanel<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'),function(v) {
        var cb = Ext.getCmp('tvbrowser<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
');
        if (cb) {
            cb.setValue(v);
            cb.fireEvent('select',{relativeUrl:v});
        }
        return '';
    });
});

// ]]>
</script>
<?php }?>
