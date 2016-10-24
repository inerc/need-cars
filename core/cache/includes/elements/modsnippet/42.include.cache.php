<?php
$userName = $modx->user->get('username');
if (($userName == "superadmin") ||($userName=="manager")){
return true;
};
return;
