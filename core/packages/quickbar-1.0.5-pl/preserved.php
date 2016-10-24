<?php return array (
  'bdd01f3d72ec060d34dd284ef1299f36' => 
  array (
    'criteria' => 
    array (
      'name' => 'quickbar',
    ),
    'object' => 
    array (
      'name' => 'quickbar',
      'path' => '{core_path}components/quickbar/',
      'assets_path' => '',
    ),
  ),
  'dd1c8cc8e5cf0abce8b8e76373005ecf' => 
  array (
    'criteria' => 
    array (
      'category' => 'QuickBar',
    ),
    'object' => 
    array (
      'id' => 25,
      'parent' => 0,
      'category' => 'QuickBar',
    ),
  ),
  'c1825e09dd5a98ae1c0c5606c4d9f191' => 
  array (
    'criteria' => 
    array (
      'name' => 'QuickBar',
    ),
    'object' => 
    array (
      'id' => 44,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'QuickBar',
      'description' => 'Include this snippet uncached just after your <body>',
      'editor_type' => 0,
      'category' => 25,
      'cache_type' => 0,
      'snippet' => 'if (!$modx->user->hasSessionContext(\'mgr\') || !$modx->hasPermission(\'edit_document\') ) return \'\';

$defaultQuickBarCorePath = $modx->getOption(\'core_path\').\'components/quickbar/\';
$quickbarsCorePath = $modx->getOption(\'quickbar.core_path\',null,$defaultQuickBarCorePath);
$quickbar = $modx->getService(\'quickbar\',\'QuickBar\',$quickbarsCorePath.\'model/quickbar/\',$scriptProperties);

$modx->regClientCSS($quickbar->parse($modx->getOption(\'quickbar.css\',null,$modx->getOption(\'assets_url\') . \'components/quickbar/retro.css\')));
return $quickbar->getChunk(\'quickbar\',array(\'mgr_url\' => MODX_MANAGER_URL));',
      'locked' => 0,
      'properties' => NULL,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => 'if (!$modx->user->hasSessionContext(\'mgr\') || !$modx->hasPermission(\'edit_document\') ) return \'\';

$defaultQuickBarCorePath = $modx->getOption(\'core_path\').\'components/quickbar/\';
$quickbarsCorePath = $modx->getOption(\'quickbar.core_path\',null,$defaultQuickBarCorePath);
$quickbar = $modx->getService(\'quickbar\',\'QuickBar\',$quickbarsCorePath.\'model/quickbar/\',$scriptProperties);

$modx->regClientCSS($quickbar->parse($modx->getOption(\'quickbar.css\',null,$modx->getOption(\'assets_url\') . \'components/quickbar/retro.css\')));
return $quickbar->getChunk(\'quickbar\',array(\'mgr_url\' => MODX_MANAGER_URL));',
    ),
  ),
  '2f8e45bed9d0fe339d7d277538d38e85' => 
  array (
    'criteria' => 
    array (
      'key' => 'quickbar.dashboard',
    ),
    'object' => 
    array (
      'key' => 'quickbar.dashboard',
      'value' => '1',
      'xtype' => 'modx-combo-boolean',
      'namespace' => 'quickbar',
      'area' => 'Toolbar',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '43aa91d38bd17f3af2648fc5da50f79a' => 
  array (
    'criteria' => 
    array (
      'key' => 'quickbar.create',
    ),
    'object' => 
    array (
      'key' => 'quickbar.create',
      'value' => '1',
      'xtype' => 'modx-combo-boolean',
      'namespace' => 'quickbar',
      'area' => 'Toolbar',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  'a64cd11a4568721cf15ce57bad6ec5a7' => 
  array (
    'criteria' => 
    array (
      'key' => 'quickbar.css',
    ),
    'object' => 
    array (
      'key' => 'quickbar.css',
      'value' => '[[++assets_url]]components/quickbar/css/sublime.css',
      'xtype' => 'textfield',
      'namespace' => 'quickbar',
      'area' => 'Theme',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '4e3b7b55fecb4618250c1d49024d087f' => 
  array (
    'criteria' => 
    array (
      'key' => 'quickbar.help',
    ),
    'object' => 
    array (
      'key' => 'quickbar.help',
      'value' => '',
      'xtype' => 'modx-combo-boolean',
      'namespace' => 'quickbar',
      'area' => 'Toolbar',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '1efa0c58cae6373d686d2f40eba3213a' => 
  array (
    'criteria' => 
    array (
      'key' => 'quickbar.helplink',
    ),
    'object' => 
    array (
      'key' => 'quickbar.helplink',
      'value' => 'http://rtfm.modx.com/display/revolution20/An+Overview+of+MODX',
      'xtype' => 'textfield',
      'namespace' => 'quickbar',
      'area' => 'Toolbar',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  'ca7c0865c7a5204e53459d24ddcdcaf1' => 
  array (
    'criteria' => 
    array (
      'key' => 'quickbar.helptarget',
    ),
    'object' => 
    array (
      'key' => 'quickbar.helptarget',
      'value' => '_blank',
      'xtype' => 'textfield',
      'namespace' => 'quickbar',
      'area' => 'Toolbar',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
);