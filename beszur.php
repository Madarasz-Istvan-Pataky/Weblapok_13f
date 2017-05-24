<?php
$conn = new mysqli('localhost','root','','nyeltudas');
  if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());}
        $conn->query('set names utf8');
$sql=$conn->prepare("insert into adatok(Nev,Kor,nyelv) values(?,?,?)");
$sql->bind_param('ssi',$nev,$kor,$nyelv);
$nev=$_POST["nev"];
$kor=$_POST["kor"];
$nyelv=$_POST["ny"];
$sql->execute();
$sql->close();
$conn->close();
?>