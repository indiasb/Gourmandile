<?php
session_start();
include("inc/constant.php");

    // destruction de la session
    session_unset();
    session_destroy();

    header('Location: index.php');

?>