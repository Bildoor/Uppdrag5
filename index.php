<?php
error_reporting(E_ALL);

$_GET['p'] = 'createtable';

include('CDatabase.php');
include('CSQLFile.php');

$db = new CDatabase('test','database');
$sql = new CSQLFile('måns');
$res = $sql->readFileParts();
$sql -> executeStatements();

var_dump($db);
echo '<hr>';
var_dump($res);
