<?php include 'tema/header.php'; ?>
<?php $sonuclar=$_GET['icerik']; ?>
<?php
$query = $db->exec("UPDATE yazilar SET hit = hit +1 WHERE baslik_seo = '$sonuclar'");
?>

<?php
$query = $db->query("SELECT * FROM yazilar WHERE baslik_seo = '$sonuclar'");
if ( $query->rowCount() ){
	foreach( $query as $row ){
		$yazi_id = $row["yazi_id"];

	}
}
?>




<?php
if (isset($_POST["gonder"])){

	$adi = addslashes($_POST['adi']);
	$yorum = addslashes($_POST['yorum']);
	$email = addslashes($_POST['email']);



	$query = $db->prepare('INSERT INTO yorumlar SET adi=:adi, yorum=:yorum, email=:email, tarih=:tarih, yazi_id=:yazi_id');

	$result = $query->execute([

		'adi' => $adi,

		'yorum' => $yorum,

		'email' => $email,

		'tarih' =>  date('Y-m-d'),

		'yazi_id' => $yazi_id,


	]);
	if($result){
		header("Refresh: 0; url=");
	}else{
		echo 'Yorum eklenemedi!';
	}

}

?>



<?php
                            
                            if (isset($_POST["gonder_bulten"]))
                            {
                            	//BURASI YANLIŞ VERİTABANI BAĞLANTISINI $db değişkeninde yapmışın
                                $kaydet_bulten = $db->prepare('INSERT INTO haber_bulteni SET email=:email, tarih=:tarih');
                                $insert_bulten = $kaydet_bulten->execute(array(
                                    ':email' => $_POST['email'],
                                    ':tarih' => date('Y-m-d'),
                                ));

                                 if($insert_bulten){
                    	echo 'Bülten Kaydınız Başarılı Bir Şekilde Gerçekleşti';
                       header("Refresh: 0; url=");
                    }else{
                    	echo 'Kayıt Gerçkeleştirilemedi';
                    }
                   }

                   print_r($_POST['gonder_bulten']);
                               
                           
                            ?>

<section class="main-content p-80">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mr-50">
				<div class="single-page-content">
					<div class="standard-post">
						<?php
						$query = $db->query("SELECT * FROM yazilar WHERE baslik_seo = '$sonuclar'");
						if ( $query->rowCount() ){
							foreach( $query as $row ){
								$baslik = $row["baslik"];
								$aciklama = $row["aciklama"];
								$yazar = $row["yazar"];
								$admin_bio = $row["admin_bio"];
								$admin_adi = $row["admin_adi"];
								$admin_soyadi = $row["admin_soyadi"];
								$admin_resim = $row["admin_resim"];
								$facebook = $row["facebook"];
								$twitter = $row["twitter"];
								$instagram = $row["instagram"];
								$resim = $row["resim"];
								$tarih = $row["tarih"];
								$icerik = $row["icerik"];
								$haber_id = $row["haber_id"];
								$kategori_adi = $row["kategori_adi"];
								$kategori_adi_seo = $row["kategori_adi_seo"];
								$haber_id = $row["haber_id"];
								$hit = $row["hit"];
								$yazi_id = $row["yazi_id"];
								date_default_timezone_set('Europe/Istanbul');
								setlocale(LC_TIME, 'tr_TR.UTF-8');
								$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=800&w=1200";
								$admin_resim="crop.php?src=".$parseurl['3']."/images/admin/".$admin_resim."&h=100&w=100";
								$sorgu = $db->prepare("SELECT COUNT(*) FROM yorumlar where yazi_id = '$yazi_id' ");
								$sorgu->execute();
								$say = $sorgu->fetchColumn();
								echo'
								<div class="blog-item">
								<div class="blog-info">
								<ul class="meta">
								<li><a href="kategori/'.$kategori_adi_seo.'" title="'.$kategori_adi.'" class="post-category">'.$kategori_adi.'</a></li>
								<li>'.strftime('%d %B %Y, %A', strtotime($row['tarih'])).'</li>
								<li><i class="la la-eye"></i>'.$hit.'</li>
								<li><a href="#" title="Yorum Sayısı"><i class="la la-comment-o"></i>'.$say.'</a></li>
								</ul>
								<h3 class="post-title">'.$baslik.'</h3>
								</div><!--blog-info end-->
								<div class="blog-img">
								<img src="'.$resim.'" alt="'.$baslik.'">
								</div><!--blog-img end-->
								'.$icerik.'
								<div class="post-catgs-links">
								
								<ul class="social-links">
								<li><a href="https://www.facebook.com/sharer.php?u='.$$actual_link.'/icerik/'.$sonuclar.'" target="_blank"" title="Facebook ta Paylaş"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/intent/tweet?text='.$baslik.'&url='.$actual_link.'/icerik/'.$sonuclar.'" title="Twitter da Paylaş"><i class="fab fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/sharing/share-offsite/?url='.$actual_link.'/icerik/'.$sonuclar.'" target="_blank" title="Linkedin de paylaş"><i class="fab fa-linkedin-in"></i></a></li>
								</ul><!--social-links end-->
								<div class="clearfix"></div>
								</div>';
							}
						}
						?>
								<!--post-catgs-links end-->
						<?php
						$query = $db->query("SELECT * FROM yazilar INNER JOIN admin ON yazilar.yazar = admin.admin_kadi WHERE baslik_seo = '$sonuclar'");
						if ( $query->rowCount() ){
							foreach( $query as $row ){
								$yazar = $row["yazar"];
								$admin_bio = $row["admin_bio"];
								$admin_adi = $row["admin_adi"];
								$admin_soyadi = $row["admin_soyadi"];
								$admin_resim = $row["admin_resim"];
								$facebook = $row["facebook"];
								$twitter = $row["twitter"];
								$instagram = $row["instagram"];
								$admin_resim="crop.php?src=".$parseurl['3']."/images/admin/".$admin_resim."&h=100&w=100";
								echo'<div class="post-author-info">
								<div class="author-img">
								<img src="'.$admin_resim.'" alt="'.$adi.' '.$soyadi.'">
								</div><!--author-img end-->
								<div class="author-info">
								<h3><a href="#" title="">'.$admin_adi.' '.$admin_soyadi.'</a></h3>
								<p>'.$admin_bio.'</p>
								<ul class="social-links">
								<li><a href="https://twitter.com/'.$twitter.'" target="_blank" title="'.$twitter.'"><i class="fab fa-twitter"></i></a></li>
								<li><a href="https://facebook.com/'.$facebook.'" target="_blank" title="'.$facebook.'"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://instagram.com/'.$instagram.'" target="_blank" title="'.$instagram.'"" title=""><i class="fab fa-instagram"></i></a></li>
								</ul><!--social-links end-->
								</div><!--author-info end-->
								</div>';
							}
						}
						?>

						<div class="post-control">
							<ul>
								<?php	
					$query = $db->query("SELECT * FROM yazilar order By rand() limit 1");
					if ( $query->rowCount() ){
					foreach( $query as $row ){
						$baslik = $row["baslik"];
						$baslik_seo = $row["baslik_seo"];

								echo'<li class="prev-p">
									<a href="icerik/'.$baslik_seo.'" title="'.$baslik.'"> <i class="fa fa-angle-left"></i>'.$baslik.'</a>
								</li>';
							}
						}
						?>

						<?php	
					$query = $db->query("SELECT * FROM yazilar order By rand() limit 1");
					if ( $query->rowCount() ){
					foreach( $query as $row ){
						$baslik = $row["baslik"];
						$baslik_seo = $row["baslik_seo"];
								echo'<li class="next-p">
									<a href="icerik/'.$baslik_seo.'" title="'.$baslik.'"><i class="fa fa-angle-right"></i>'.$baslik.'</a>
								</li>';
							}
						}
						?>
							</ul>
						</div><!--post-control end-->

					</div>
				</div><!--standard-post end-->
				<div class="blog-section tp-pst">
					<div class="sec-title">
						<h3>Benzer Yazılar</h3>
					</div><!--sec-title end-->
					<div class="blog-items">
						<div class="row">
							<?php	
				$query = $db->query("SELECT * FROM yazilar order By rand() LIMIT 6");
				if ( $query->rowCount() ){
					foreach( $query as $row ){
						$baslik = $row["baslik"];
						$baslik_seo = $row["baslik_seo"];
						$aciklama = $row["aciklama"];
						$resim = $row["resim"];
						$tarih = $row["tarih"];
						$yazar = $row["yazar"];
						$resim = $row["resim"];
						$hit = $row["hit"];
						$kategori_adi = $row["kategori_adi"];
						$kategori_adi_seo = $row["kategori_adi_seo"];
						$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=380&w=532";
						
							echo'<div class="col-lg-4 col-md-4 col-sm-6 col-12 bosluk">
								<div class="blog-item">
									<div class="blog-img">
										<img src="'.$resim.' alt="'.$baslik.'">
									</div><!--blog-img end-->
									<div class="blog-info">
										<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
										<ul class="meta">
											<li>'.strftime('%d %B %Y, %A', strtotime($tarih)).'</li>
											<li><i class="la la-eye"></i>'.$hit.'</li>
											
										</ul>
									</div><!--blog-info end-->
								</div>
								<!--blog-item end-->
							</div>';
						}
					}
					?>
						
						</div>
					</div>
					<!--blog-items end-->
				</div>
				<!--blog-section top-post end-->
				<!--post-author-info end-->

				<div class="comment-section">
					<div class="comment-list-sec">
						<div class="sec-title">
							<h3>Yorumlar</h3>
						</div>
						<!--sec-title end-->
						<ul class="comment-list">
							<li>
								<?php
								$query = $db->query("SELECT * FROM yorumlar WHERE yazi_id = '$yazi_id'");
								if ( $query->rowCount() ){
									foreach( $query as $row ){
										$adi = $row["adi"];
										$yorum = $row["yorum"];
										$email = $row["email"];
										$tarih = $row["tarih"];
										date_default_timezone_set('Europe/Istanbul');
										setlocale(LC_TIME, 'tr_TR.UTF-8');
										echo'<div class="comment">
										<div class="cm-img">
										<img src="images/user.png" alt="">
										</div>
										<div class="cm-info">
										<div class="cm-hed">
										<h3>'.$adi.'</h3>
										<span>'.strftime('%d %B %Y, %A', strtotime($tarih)).'</span>
										</div>
										<div class="clearfix"></div>
										<p>'.$yorum.'</p>
										</div>
										</div>';
									}
								}
								?>
								<!--comment end-->


							</ul>
						</div>
						<!--comment-list end-->
						<div class="comment-form">
							<div class="sec-title">
								<h3>Yazı Hakkındaki Görüşünü Paylaş</h3>
							</div>
							<!--sec-title end-->
							<div class="cont-form-sec">
								<form action="" method="post">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-field">
												<input type="text" name="adi" placeholder="Adınız ve Soyadınız" required="">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-field">
												<input type="email" name="email" placeholder="Email Adresiniz" required="">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-field">
												<textarea name="yorum" placeholder="Yorumunuz"></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<input type="submit" name="gonder" value="Yorumunu Paylaş">
										</div>
									</div>
								</form>
							</div>
						</div>
						<!--comment-form end-->
					</div>
					<!--comment-section end-->
				</div>
				<!--single-page-content end-->
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<div class="widget widget-trending-posts">
						<h3 class="widget-title">Popüler Yazılar</h3>
						<div class="wd-posts">
							<?php	
							$query = $db->query("SELECT * FROM yazilar order By hit DESC LIMIT 6");
							if ( $query->rowCount() ){
								foreach( $query as $row ){
									$baslik = $row["baslik"];
									$baslik_seo = $row["baslik_seo"];
									$aciklama = $row["aciklama"];
									$resim = $row["resim"];
									$tarih = $row["tarih"];
									$yazar = $row["yazar"];
									$resim = $row["resim"];
									$hit = $row["hit"];
									$kategori_adi = $row["kategori_adi"];
									$kategori_adi_seo = $row["kategori_adi_seo"];
									$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=67&w=83";
									echo'<div class="wd-post">
									<img src="'.$resim.'" alt="'.$baslik.'">
									<div class="wd-post-info">
									<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
									<span class="post-date">'.strftime('%d %B %Y, %A', strtotime($tarih)).'</span>
									</div>
									</div>';
								}
							}
							?>
							<!--wd-post end-->



						</div>
						<!--wd-posts end-->
					</div>
					
					<div class="widget subscribe-wd">
						<h3 class="widget-title">Haber Bülteni</h3>
						<form action="" method="post">
							<input type="email" name="email" placeholder="Email Adresinizi Yazın">
							<button type="submit" name="gonder_bulten"><i class="far fa-paper-plane"></i></button>
						</form>
						<img src="images/penc-img.png" alt="" class="penc-img">
					</div>
					<!--subscribe-wd end-->
					<div class="widget widget-recent-post">
						<h3 class="widget-title">En Çok Yorum Alanlar</h3>
						<div class="recent-post-carousel">

							<?php	
							$query = $db->query("SELECT * FROM yorumlar INNER JOIN yazilar ON yorumlar.yazi_id = yazilar.yazi_id order By yorum_id DESC LIMIT 4");
							if ( $query->rowCount() ){
								foreach( $query as $row ){
									$baslik = $row["baslik"];
									$baslik_seo = $row["baslik_seo"];
									$resim = $row["resim"];
									$yazi_id = $row["yazi_id"];
									$hit = $row["hit"];
									$kategori_adi = $row["kategori_adi"];
									$kategori_adi_seo = $row["kategori_adi_seo"];
									$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=130&w=170";
									echo'<div class="post-slide">
									<div class="wd-post">
									<img src="'.$resim.'" alt="'.$baslik.'">
									<div class="wd-post-info">
									<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
									</div>
									</div>
									</div>';
								}
							}
							?>
							<!--post-slide end-->
						</div>
						<!--carousel end-->
					</div>
					<!--widget-recent-post end-->
					<div class="widget widget-adver">
						<a href="#" title=""><img src="images/resources/ad-img.jpg" alt=""></a>
					</div>
					<!--widget-adver end-->
					<div class="widget widget-catgs">
						<h3 class="widget-title">Kategoriler</h3>
						<ul class="catgs-links">
							<?php 		
							$query = $db->query("SELECT * FROM kategoriler");
							if ( $query->rowCount() ){
								foreach( $query as $row ){
									$kategori_adi = $row["kategori_adi"];
									$kategori_adi_seo = $row["kategori_adi_seo"];
									$kategori_aciklama = $row["kategori_aciklama"];

									$sorgu = $db->prepare("SELECT COUNT(*) FROM yazilar where kategori_adi_seo = '$kategori_adi_seo' ");
									$sorgu->execute();
									$say = $sorgu->fetchColumn();
									echo'<li><a href="kategori/'.$kategori_adi_seo.'" title="'.$kategori_adi.'">'.$kategori_adi.'  - <span>'.$say.'</span></a></li>';
								}
							}
							?>
						</ul>
						<!--catgs-links end-->
					</div>
					
						</div>
					</div>
					<!--widget-fb end-->
				</div>
				<!--sidebar end-->
			</div>
		</div>
	</div>
</section>
<!--main-content end-->

<?php include 'tema/footer.php'; ?>