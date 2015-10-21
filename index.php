<?php
error_reporting(E_ALL);

$_GET['p'] = 'createtable';

include('CDatabase.php');
include('CSQLFile.php');
include('CSQLFileMenu.php');

$db = new CDatabase('test','database');
$sql = new CSQLFile('måns');
$filemenu = new CSQLFileMenu();
$res = $sql->readFileParts($_GET['p']);
echo $sql -> executeStatements();
echo $filemenu -> getMainMenu(); 
