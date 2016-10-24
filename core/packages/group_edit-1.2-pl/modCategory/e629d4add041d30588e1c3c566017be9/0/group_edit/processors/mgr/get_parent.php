<?php
/**
 * Get a list of resources
 *
 * @package group_edit
 * @subpackage processors
 */

$lang = $modx->getOption('manager_language',null,'ru');
$modx->lexicon->load($lang.':group_edit:default');

$res_id = $modx->getOption('id',$_REQUEST,0);

$output = array();

if($res_id){
    $res = $modx->getObject('modResource',$res_id);
    $output = array(
        'id' => $res->get('id'),
        'pagetitle' => $res->get('pagetitle')
    );
}

return $modx->error->success('',array($output));