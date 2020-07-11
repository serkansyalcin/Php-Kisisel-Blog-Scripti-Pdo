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
                    $icerik = addslashes($_POST["icerik"]);                    
                    $sql = "INSERT INTO sayfalar (baslik, baslik_seo, aciklama, icerik) VALUES ('".$baslik."','".$baslik_seo."','".$aciklama."','".$icerik."')";
                    $ekle = mysqli_query($conn, $sql);

                    if($ekle){
                    	echo 'Sayfa eklendi';
                       header("Refresh: 2; url=sayfa-ekle.php");
                    }else{
                    	echo 'Sayfa eklenemedi!';
                    }
                   }

                   //print_r($_POST);

                ?>



	<div class="container p-5">

		<h4>Sayfa Ekle</h4>
		<hr>

		<form action="" method="post">

			<div class="form-group">
				<label for="portfolio_category">Sayfa Adı</label>
				<input type="text" class="form-control" name="baslik">
			</div>
			<div class="form-group">
				<label for="portfolio_category">Sayfa Açıklama</label>
				<input type="text" class="form-control" name="aciklama">

			</div>


			<div class="form-group">
				<label for="portfolio_category">Sayfa İçerik</label>
				<textarea id="editor" name="icerik" id="" cols="20" rows="5"></textarea>

			</div>


			<div class="form-group">

				<input type="submit" class="btn btn-primary" name="ekle_haber" value="Sayfa Ekle">
			</div>
		</form>
	</div>
	<script>
		ClassicEditor
			.create(document.querySelector('#editor'))
			.catch(error => {
				console.error(error);
			});
	</script>