<?php

$mysql = new mysqli('localhost','root','root', 'db-card');
$rows = [];
$result = $mysql->query("SELECT * FROM cardarticles ORDER BY `id` DESC");
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
return $rows;

