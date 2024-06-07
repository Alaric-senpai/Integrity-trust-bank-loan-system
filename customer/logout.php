<?php
require '../client.php';

session_destroy();
header("location:".URL."index.php");
exit();
