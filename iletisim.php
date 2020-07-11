<?php include 'tema/header.php'; ?>

 <?php
                            
                            if ($_POST['gonder']) // Verilerin Post Edilip Edilmediğini Kontrol Ediliyor
                            {
                            	//BURASI YANLIŞ VERİTABANI BAĞLANTISINI $db değişkeninde yapmışın
                                $kaydet = $db->prepare('INSERT INTO iletisim SET ad_soyad=:ad_soyad, email=:email, konu=:konu, mesaj=:mesaj'); //Eğer Veriler Post Edildiyse Post Edilen Verilen Veritabanına Gönderiliyor
                                $insert = $kaydet->execute(array(  // Sorgumuz çalıştırıp ARRAY değişkeniyle tanımlanıyor
                                    ':ad_soyad' => $_POST['ad_soyad'],
                                    ':email' => $_POST['email'],
                                    ':konu' => $_POST['konu'],
                                    ':mesaj' => $_POST['mesaj'],
                                ));

                                 if($insert){
                    	echo 'Mesajınız Gönderildi';
                       header("Refresh: 2; url=iletisim.php");
                    }else{
                    	echo 'Mesaj Gönderilemedi!';
                    }
                   }
                               
                           
                            ?>

<section class="main-content">
	<div class="container-fluid p-0">
		<div class="contact-sec">
			<div class="cont-img">
				<img src="images/resources/contact-bg.jpg" alt="">
			</div>
			<div class="cont-form-sec">
				<h1>İletişim</h1>
				<p>Destek veya önerileriniz için bizim ile iletişime geçin.</p>
				<form action="" method="POST">
					<div class="form-field">
						<input type="text" name="ad_soyad" placeholder="Adınız ve Soyadınız" required>
					</div>
					<div class="form-field">
						<input type="email" name="email" placeholder="Email Adresiniz" required>
					</div>
					<div class="form-field">
						<input type="text" name="konu" placeholder="Konu">
					</div>
					<div class="form-field">
						<textarea name="mesaj" placeholder="Mesajınız"></textarea>
					</div>
					<input type="submit" name="gonder" value="Gönder">
				</form>
			</div>
			<!--cont-form-sec end-->
			<div class="clearfix"></div>
		</div>
		<!--contact-sec end-->
	</div>
</section>
<!--main-content end-->

<?php include 'tema/footer.php'; ?>