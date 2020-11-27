<?php

//======== Get wesite root directory ==========
$current_file = str_replace('\\', '/', __File__) ;
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$web_root = str_replace(array($doc_root,"database/constants.php"),'',$current_file);
define("WEB_ROOT",$web_root);


define("HEADER", TRUE);
define("FOOTER", TRUE);


?>