<?php

try {
$conn = new PDO("mysql:host={$_ARCHON->db->ServerAddress};dbname={$_ARCHON->db->DatabaseName}", $_ARCHON->db->Login, $_ARCHON->db->Password);
      }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$sth = $conn->query("SHOW TABLE STATUS");
$dbSize = 0;
$Result = $sth->fetchAll();
 foreach ($Result as $Row){
      $dbSize += $Row["Data_length"] + $Row["Index_length"];
      };


$sth = $conn->prepare('SELECT COUNT(DISTINCT ID) as `count` FROM tblCollections_Collections');  
    $sth->execute();  
        $colresults = $sth->fetchAll(PDO::FETCH_ASSOC);
         

$colnr = ($colresults[0]['count']);



$mbytes = ($dbSize/(1024*1024)+1000);
$mbytesr = round($mbytes, 2);



$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator('/var/www/Archon/'));

$totalSize = 0
;foreach($iterator as $file) {
    $totalSize += $file->getSize();
}
$mbytes2 = $totalSize/(1024*1024);
$mbytes2r = round($mbytes2, 2);




$combinedmb = $mbytes2 + $mbytes;
$totalmb = 4096;
$freespace = $totalmb - $combinedmb;

$percentage = ($combinedmb/$totalmb)*100;
$percentager = round($percentage, 2);

$mbytespercentage = ($mbytes/$totalmb)*100;
$mbytes2percentage = ($mbytes2/$totalmb)*100;

?>