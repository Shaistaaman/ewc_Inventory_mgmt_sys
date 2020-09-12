<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);

$database = 'stock';
$user = 'root';
$pass = '';
$host = 'localhost';
$dir = dirname(__FILE__) . DS . 'stock.sql';

$mysqlDir = 'C:'.DS.'xampp'.DS.'mysql'.DS.'bin';    // Paste your mysql directory here and be happy
$mysqldump = $mysqlDir.DS.'mysqldump';

echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
exec("{$mysqldump} --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);
var_dump($output);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../atif/inventory/starter.php">';

?>