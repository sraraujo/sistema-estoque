<?php

    session_start();

    if (!isset($_SESSION["user"]) && (!isset($_GET["admin"]))){
        header("location: login.php");

    } else{      

        include_once "controller/config.php";
        include_once "controller/validate.php";

        function pageContent(){
            pageValidate();
        }    

        include_once "view/pagina-admin/layout.php";
    }
?>