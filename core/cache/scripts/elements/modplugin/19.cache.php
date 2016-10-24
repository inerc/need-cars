<?php  return 'if($modx->context->get(\'key\') != "mgr" && $modx->resource->get(\'cacheable\')){
  $expires = 60*60*24*1;
  header("Pragma: public");
  header("Cache-Control: maxage=".$expires);
  header(\'Expires: \' . gmdate(\'D, d M Y H:i:s\', time()+$expires) . \' GMT\');

  $dateLastmodif = strtotime($modx->resource->get(\'editedon\'));
  if(empty($dateLastmodif)) $dateLastmodif = strtotime($modx->resource->get(\'createdon\'));
  header(\'Last-Modified: \' . gmdate(\'D, d M Y H:i:s\', $dateLastmodif) . \' GMT\');
}
return;
';