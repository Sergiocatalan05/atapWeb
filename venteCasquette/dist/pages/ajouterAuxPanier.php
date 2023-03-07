<?php
session_start();


    array_push($_SESSION['produitsPanier'], $_GET['id']);


var_dump( $_SESSION['produitsPanier']['$_GET["id"]']);
header('location: ../index.php');
