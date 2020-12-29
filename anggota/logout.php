<?php
session_start();
$_SESSION["username"];
$_SESSION["status"];

unset($_SESSION["username"]);
unset($_SESSION["status"]);

session_unset();
session_destroy();

header("location:../index.php?pesan=logout");
