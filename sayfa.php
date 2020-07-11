<?php include 'tema/header.php'; ?>
<?php $sonuclar=$_GET['sayfa']; ?>

<?php
	$query = $db->query("SELECT * FROM sayfalar WHERE baslik_seo = '$sonuclar'");
        if ( $query->rowCount() ){
        foreach( $query as $row ){
        	$baslik = $row["baslik"];
        	$baslik_seo = $row["baslik_seo"];
        	$aciklama = $row["aciklama"];
        	$icerik = $row["icerik"];
        	}
        }?>



<section class="main-content lg-back">
	<div class="container">
		<div class="about-sec">
			<div class="row">
		
				<div class="col-lg-10">
					<div class="about-cont">
						<h1><?php echo $baslik ?></h1>
						<?php echo $icerik ?>
						
				</div>
			</div>
		</div>
		<!--about-sec end-->
	</div>
</section>
<!--main-content end-->

<?php include 'tema/footer.php'; ?>