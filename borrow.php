<?php
header("Location: borrowbooks.php");
include_once('connection.php');
array_map("htmlspecialchars", $_POST);
