<?php
    /**
     * check_login.php
     * digunakan untuk check status login dari user
     * apabila belum login, maka akan dikembalikan ke halaman login.php
     */
    
    //memanggil file connect.php
    require_once "connection.php";
    session_start();
    if($_SESSION['username'] == "" || $_SESSION['username'] == null){
        //echo $_SESSION['username'];
        header("location:login.php");
    }
?>