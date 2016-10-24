<?php /* Smarty version Smarty-3.0.4, created on 2016-04-07 13:35:49
         compiled from "/home/f/fanclo/need-cars.ru/public_html/_webmanager/templates/default/element/tv/renders/input/richtext.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8268768855706380543f6b4-98018953%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e346acc8dc232d60696376cfc61e3f84b273eab' => 
    array (
      0 => '/home/f/fanclo/need-cars.ru/public_html/_webmanager/templates/default/element/tv/renders/input/richtext.tpl',
      1 => 1459973754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8268768855706380543f6b4-98018953',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/f/fanclo/need-cars.ru/public_html/core/model/smarty/plugins/modifier.escape.php';
?><textarea id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" name="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" class="modx-richtext" onchange="MODx.fireResourceFormChange();"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->get('value'));?>
</textarea>

<script type="text/javascript">

Ext.onReady(function() {
    
    MODx.makeDroppable(Ext.get('tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'));
    
});
</script>