<?php session_start();
 session_destroy();
/*
        $_SESSION["uye_adi"] = null;
        $_SESSION["uye_soyadi"] = null;
        $_SESSION["uye_kadi"] = null;
        $_SESSION["uye_sifre"] = null;
        $_SESSION["uye_email"] = null;
        $_SESSION["uye_durum"] = null;
        */
header("location: login.php");
?>