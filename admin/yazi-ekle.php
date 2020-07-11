<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>



	<?php ?>




	<?php

    if (isset($_POST["ekle_haber"])){

       function seflink($text)
       {
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $text = strtolower(str_replace($find, $replace, $text));
        $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
        $text = trim(preg_replace('/\s+/', ' ', $text));
        $text = str_replace(' ', '-', $text);
        return $text;
    }




					//print_r($_POST);
    $baslik =  addslashes($_POST["baslik"]);
    $baslik_seo = seflink($baslik);
    $aciklama =  addslashes($_POST["aciklama"]);
    $resim =  $_POST["image"];
    $icerik = addslashes($_POST["icerik"]);
    $kategori_adi = $_POST["kategori_adi"];
    $kategori_adi_seo = seflink($kategori_adi);
    $tarih = date('Y-m-d H:i:s');



    $photoName = "yazi_".rand(10,999999);

    $photo = $_FILES['image'];

    $handle = new Upload($photo);
    if ($handle->uploaded) {

        $handle->file_new_name_body = $photoName;

        $handle->Process('../images/yazilar/');
        /* Resim Yükleme İzni */
        $handle->allowed = array('image/*');
        if ($handle->processed) {
            echo 'Yüklendi!';
        } else {
            echo 'Yükleme Hatası';
        }

        $handle-> Clean();

    } else {
        echo 'Görsel Yükleme Hatası';
    }



    $sql = "INSERT INTO yazilar (baslik, baslik_seo, aciklama, resim, icerik, kategori_adi, kategori_adi_seo, tarih, yazar) VALUES ('".$baslik."','".$baslik_seo."','".$aciklama."','".$handle->file_dst_name."','".$icerik."','".$kategori_adi."','".$kategori_adi_seo."','".$tarih."','".$_SESSION["admin_kadi"]."')";
    $ekle = mysqli_query($conn, $sql);

    if($ekle){
       echo 'Haber eklendi';
       header("Refresh: 2; url=yazi-ekle.php");
   }else{
       echo 'Haber eklenemedi!';
   }
   $handle-> Clean();
}

                   //print_r($_POST);

?>



	<div class="container p-5">

		<h4>Yazı Ekleme Sayfası</h4>
		<hr>

		<form action="" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label for="portfolio_category">Yazı Başlık</label>
				<input type="text" class="form-control" name="baslik">
			</div>
			<div class="form-group">
				<label for="portfolio_category">Yazı Açıklama</label>
				<input type="text" class="form-control" name="aciklama">

			</div>

			<div class="form-group">
				<label for="portfolio_name">Yazı Kategori</label>
				<select class="form-group form-control" name="kategori_adi">

					<?php 

                $ekle_bolum_sql = "SELECT * FROM kategoriler";
                $ekle_bolum_run = mysqli_query($conn, $ekle_bolum_sql);

                while($ekle_bolum_row = mysqli_fetch_assoc($ekle_bolum_run)){

                   $edited_category = $ekle_bolum_row["kategori_adi"];

                   if($ekle_bolum_row["kategori_adi"] == $row["kategori_adi"]){
                    echo"<option selected>$edited_category</option>";

                } 

                echo"<option>$edited_category</option>";

            }

            ?>

				</select>
			</div>
			<div class="form-group">
				<label for="portfolio_name">Yazı Resim</label>
				<input type="file" class="form-control" name="image">
			</div>

			<div class="form-group">
				<label for="portfolio_category">Yazı İçerik</label>
				<textarea id="editor" name="icerik" id="" cols="20" rows="5"></textarea>

			</div>


			<div class="form-group">

				<input type='hidden' name='yazar' value='<?php echo $_SESSION["admin_kadi"]; ?>'>
				<input type="submit" class="btn btn-primary" name="ekle_haber" value="Haber Ekle">
			</div>
		</form>
	</div>
  <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

    </script>
    <?php include "includes/admin_footer.php"; ?>