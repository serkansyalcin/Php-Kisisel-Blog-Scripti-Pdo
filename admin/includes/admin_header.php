<?php include "includes/db.php";
include "../includes/sef.php";
include "../includes/upload.php";
session_start(); 
ob_start();


if(empty($_SESSION["admin_durum"]) or $_SESSION["admin_durum"] !="Yönetici"){
    header ("Location: login.php");
    //echo'<meta http-equiv="refresh" content="0;URL=login.php">';
    die();
}


?>

 <?php
                
                $sql_query ="SELECT * FROM ayarlar";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
                while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $site_adi = $row["site_adi"];
                $site_aciklama = $row["site_aciklama"];
                $logo = $row["logo"];
                $footer_yazi = $row["footer_yazi"];

                ?>
                <?php  } ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $site_adi ?> | Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- google charts-->
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     
     <script src="css/ckeditor5/ckeditor.js"></script>

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="../" target="_blank"><?php echo $site_adi ?> | Admin</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
     
     <a class="nav-link" href="logaut.php">
         <span> Çıkış Yap </span>
         <i class="fas fa-sign-out-alt"></i>
     </a>
      </div>
      </nav>