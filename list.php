<?php 
require 'client.php';

$db = $client->integrity_bank;

$users = $db->users;
$login = $db->login;
$login_beta = $db->login_beta;

// echo $users();
$indexes = $login_beta->listIndexes();
foreach($indexes as $index){
    echo "index ". $index ."<br>";
}
// $login->dropIndex('id_number_1');

// $indexes = $users->listIndexes();

echo "Indexes after removal:\n";

