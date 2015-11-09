<?php
// connect to the MYSQL database
try {
// List OpenShift Env Variables
// Or simply use a Superglobal ($_SERVER or $_ENV)
$mysql_user = $_ENV['MYSQL_USER'];
$mysql_password = $_ENV['MYSQL_PASSWORD'];
$my_database = $_ENV['MYSQL_DATABASE'];
$mysql_service_host = $_ENV['MYSQL_SERVICE_HOST'];
$mysql_service_port = $_ENV['MYSQL_SERVICE_PORT'];
$mysql_host = $mysql_service_host . ":" . $mysql_service_port;

$conn = new PDO("mysql:host={$mysql_host};dbname={$my_database}", $mysql_user, $mysql_password);
      }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

// retreive database size
$sth = $conn->query("SHOW TABLE STATUS");
$dbSize = 0;
$Result = $sth->fetchAll();
 foreach ($Result as $Row){
      $dbSize += $Row["Data_length"] + $Row["Index_length"];
      };

// convert dbsize to MB and round -- I added 1000 because the size of my test DB was so small 
$sizedb = ($dbSize/(1024*1024)+1000);
$sizedbr = round($sizedb, 2);

// calculate disk space usage and round
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator('/var/lib/mysql/data'));

$totalSize = 0
;foreach($iterator as $file) {
    $totalSize += $file->getSize();
}
$sizefiles = $totalSize/(1024*1024);
$sizefilesr = round($sizefiles, 2);

// combine dbsize and filesize, this number is subtracted from allocated ($totalspace) space 
$combinedmb = $sizefiles + $sizedb;
$totalspace = 4096;
$freespace = $totalspace - $combinedmb;

// count number of collections in Archon
$sth = $conn->prepare('SELECT COUNT(DISTINCT ID) as `count` FROM tblCollections_Collections');  
    $sth->execute();  
        $colresults = $sth->fetchAll(PDO::FETCH_ASSOC);
         
$colnr = ($colresults[0]['count']);

// more rounding for the interface (graphs)
$percentage = ($combinedmb/$totalspace)*100;
$percentager = round($percentage, 2);

$sizedbpercentage = ($sizedb/$totalspace)*100;
$sizedb2percentage = ($sizedb2/$totalspace)*100;

?>
