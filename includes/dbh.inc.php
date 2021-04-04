<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword ="";
$dbName = "train";

$connect = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

$query = "INSERT INTO `archive` (SELECT * FROM `train` WHERE `date_depart`< CURDATE() OR `NbPClasse` <= 0 AND `NbSClasse` <= 0 AND `trainID` NOT IN (SELECT `trainID` FROM `archive`))";
      mysqli_query($connect,$query);


?>