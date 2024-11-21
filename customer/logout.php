<?php
require '../client.php';

session_destroy();
header("location:".URL."login.php");
exit();
