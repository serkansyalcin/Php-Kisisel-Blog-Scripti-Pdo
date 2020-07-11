<?php include "includes/db.php"; ?>

<?php session_start(); 
ob_start();?>

<?php



if(isset($_POST["login"])){

    $kullanici_adi = $_POST["admin_kadi"];
    $kullanici_sifre = $_POST["admin_sifre"];

    $kullanici_adi = mysqli_real_escape_string($conn, $kullanici_adi);

    $kullanici_sifre = mysqli_real_escape_string($conn, $kullanici_sifre);
    $query = "SELECT * FROM admin WHERE admin_kadi = '{$kullanici_adi}'";
    $select_uye_query = mysqli_query($conn, $query);

    if(!$select_uye_query){



        die("QUERY FAILED". mysqli_error($conn));

    }


    while($row = mysqli_fetch_assoc($select_uye_query)){



        



        $db_admin_id = $row["admin_id"];



        $db_admin_adi = $row["admin_adi"];



        $db_admin_soyadi = $row["admin_soyadi"];



        $db_admin_kadi = $row["admin_kadi"];



        $db_admin_sifre = $row["admin_sifre"];



        $db_admin_mail = $row["admin_mail"];



        $db_admin_durum = $row["admin_durum"];



		



    }



    



    if($kullanici_adi !== $db_admin_kadi && $kullanici_sifre !== $db_admin_sifre ){



        header ("Location: login.php");



        //echo'<meta http-equiv="refresh" content="0;URL=login.php">';



        



    }



    else if ($kullanici_adi == $db_admin_kadi && $kullanici_sifre == $db_admin_sifre ){



        



		$_SESSION['admin_id'] = $db_admin_id;



		   $_SESSION["admin_adi"] = $db_admin_adi;



        $_SESSION["admin_soyadi"] = $db_admin_soyadi;



        $_SESSION["admin_kadi"] = $db_admin_kadi;



        $_SESSION["admin_sifre"] = $db_admin_sifre;



        $_SESSION["admin_mail"] = $db_admin_mail;



        $_SESSION["admin_durum"] = $db_admin_durum;



        



        header ("Location: index.php");



        //echo'<meta http-equiv="refresh" content="0;URL=index.php">'; refresh'in yüklenmesi biraz zaman alır header location daha 



        



    }



    



}















?>







<!DOCTYPE html>



<html lang="en">







  <head>







    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <meta name="description" content="">



    <meta name="author" content="">







    <title>Yalçın Yazılım | Giriş</title>







    <!-- Bootstrap core CSS-->



    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">







    <!-- Custom fonts for this template-->



    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">







    <!-- Custom styles for this template-->



    <link href="css/sb-admin.css" rel="stylesheet">







  </head>







  <body class="bg-dark">







    <div class="container">



      <div class="card card-login mx-auto mt-5">



        <div class="card-header">Yönetici Girişi</div>



        <div class="card-body">



          <form action="" method="post">



            <div class="form-group">



              <div class="form-label-group">



                <input type="text" id="inputUsername" name="admin_kadi" class="form-control" placeholder="Kullanıcı Adı" required="required" autofocus="autofocus">



                <label for="inputUsername">Kullanıcı Adı</label>



              </div>



            </div>



            <div class="form-group">



              <div class="form-label-group">



                <input type="password" id="inputPassword" name="admin_sifre" class="form-control" placeholder="Şifre" required="required">



                <label for="inputPassword">Şifre</label>



              </div>



            </div>



            <button class="btn btn-primary btn-block" name="login" type="submit">Giriş Yap</button>



          </form>



        </div>



      </div>



    </div>







    <!-- Bootstrap core JavaScript-->



    <script src="vendor/jquery/jquery.min.js"></script>



    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>







    <!-- Core plugin JavaScript-->



    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>







  </body>







</html>