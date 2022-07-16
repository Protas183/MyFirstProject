<?php

$mysql = new mysqli('localhost','root','root', 'db-card');

$result = $mysql->query("SELECT * FROM cardarticle");
$cardarticle = $result->fetch_assoc();
return $cardarticle;