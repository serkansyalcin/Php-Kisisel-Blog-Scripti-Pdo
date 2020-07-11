
<?php
	$query = $db->query("SELECT * FROM ayarlar");
	if ( $query->rowCount() ){

		foreach( $query as $row ){
			$site_adi = $row['site_adi'];
			$site_aciklama = $row['site_aciklama'];
			$logo = $row['logo'];
			$footer_yazi = $row['footer_yazi'];
		}
	}
?>

<?php
								$query = $db->query("SELECT * FROM sosyal_medya");
								if ( $query->rowCount() ){
									foreach( $query as $row ){
										$facebook = $row["facebook"];
										$instagram = $row["instagram"];
										$twitter = $row["twitter"];
										
									}
								}
								?>




	<?php

	function title(){

		global $db;

		global $site_adi;

		global $site_aciklama;

		$sonuclar = @$_GET['icerik'];

		if($sonuclar){

			$sorgu = $db->prepare("SELECT * FROM yazilar  where baslik_seo = '$sonuclar'");

			$sorgu->execute();

			$row = $sorgu->fetch(PDO::FETCH_ASSOC);

			$title['baslik'] = $row['baslik']." | ".$site_adi;

			$title['aciklama'] = $row['aciklama']." | ".$site_adi;

			$title['baslik_seo'] = $row['baslik_seo'];

			

		}



		else

		{

			$title['baslik'] = $site_adi;

			$title['aciklama'] = $site_aciklama;

		}



		return $title;

		

	}



	$title = title();



	?>
