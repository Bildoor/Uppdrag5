<?php
error_reporting(E_ALL);

$_GET['p'] = 'createtable';

include('CDatabase.php');
include('CSQLFile.php');

$db = new CDatabase('test','database');
$sql = new CSQLFile('måns');
$res = $sql->readFileParts();
echo $sql -> executeStatements();
