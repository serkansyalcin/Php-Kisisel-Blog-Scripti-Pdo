<?php include 'tema/header.php'; ?>
<?php 
$ara = strip_tags($_GET["ara"]) ?>
<section class="main-content p-70 pb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mgr-50">
				<div class="featured-stories p-70">
					<div class="container">
						<div class="sec-title">
							<h3>Arama Sonuçları</h3>
						</div><!--sec-title end-->
						<div class="blog-items">
							<div class="row">
						<?php	
						$query = $db->query("SELECT * FROM yazilar WHERE baslik LIKE '%".$ara."%' ORDER BY yazi_id DESC");

						$yazi_say = $query->rowCount();
						if($yazi_say){
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
										$yazi_id = $row["yazi_id"];
										$kategori_adi = $row["kategori_adi"];
										$kategori_adi_seo = $row["kategori_adi_seo"];
										$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=180&w=246";
										$sorgu = $db->prepare("SELECT COUNT(*) FROM yorumlar where yazi_id = '$yazi_id' ");
								$sorgu->execute();
								$say = $sorgu->fetchColumn();
								echo'<div class="col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="blog-item">
										<div class="blog-img">
										<img src="'.$resim.'" alt="'.$baslik.'">
										</div><!--blog-img end-->
										<div class="blog-info">
										<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
										<ul class="meta">
										<li>'.strftime('%d %B %Y, %A', strtotime($tarih)).'</li>
										<li><i class="la la-eye"></i>'.$hit.'</li>
										<li><i class="la la-comment-o"></i>'.$say.'</li>
										</ul>
										</div><!--blog-info end-->
										</div><!--blog-item end-->
										</div>';
									}
								}
								}
								else{
									
						$query = $db->query("SELECT * FROM yazilar WHERE kategori_adi LIKE '%".$ara."%' ORDER BY yazi_id DESC");

						$yazi_say = $query->rowCount();
						if($yazi_say){
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
										$yazi_id = $row["yazi_id"];
										$kategori_adi = $row["kategori_adi"];
										$kategori_adi_seo = $row["kategori_adi_seo"];
										$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=180&w=246";
										$sorgu = $db->prepare("SELECT COUNT(*) FROM yorumlar where yazi_id = '$yazi_id' ");
								$sorgu->execute();
								$say = $sorgu->fetchColumn();
								echo'<div class="col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="blog-item">
										<div class="blog-img">
										<img src="'.$resim.'" alt="'.$baslik.'">
										</div><!--blog-img end-->
										<div class="blog-info">
										<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
										<ul class="meta">
										<li>'.strftime('%d %B %Y, %A', strtotime($tarih)).'</li>
										<li><i class="la la-eye"></i>'.$hit.'</li>
										<li><i class="la la-comment-o"></i>'.$say.'</li>
										</ul>
										</div><!--blog-info end-->
										</div><!--blog-item end-->
										</div>';
									}
								}
								
								}
								}

								

								?>
							</div>
						</div><!--blog-items end-->
					</div>
				</div><!--recommend-posts end-->
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<div class="widget widget-trending-posts">
						<h3 class="widget-title">Popüler Yazılar</h3>
						<div class="wd-posts">
							<?php	
							$query = $db->query("SELECT * FROM yazilar order By yazi_id DESC LIMIT 6");
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
									$yazi_id = $row["yazi_id"];
									$kategori_adi = $row["kategori_adi"];
									$kategori_adi_seo = $row["kategori_adi_seo"];
									$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=67&w=83";
									$sorgu = $db->prepare("SELECT COUNT(*) FROM yorumlar where yazi_id = '$yazi_id' ");
								$sorgu->execute();
								$say = $sorgu->fetchColumn();
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
						</div><!--wd-posts end-->
					</div><!--widget-trending-posts end-->
					
					<div class="widget subscribe-wd">
						<h3 class="widget-title">Haber Bülteni</h3>
						<form>
							<input type="email" name="email" placeholder="Email Adresinizi Yazın">
							<button type="submit"><i class="far fa-paper-plane"></i></button>
						</form>
						<img src="images/penc-img.png" alt="" class="penc-img">
					</div>
					<div class="widget widget-recent-post">
						<h3 class="widget-title">En Çok Yorum Alanlar</h3>
						<div class="recent-post-carousel">

							<?php	
							$query = $db->query("SELECT * FROM yazilar order By yazi_id DESC LIMIT 0,4");
							if ( $query->rowCount() ){
								foreach( $query as $row ){
									$baslik = $row["baslik"];
									$baslik_seo = $row["baslik_seo"];
									$resim = $row["resim"];
									$resim = $row["resim"];
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
						</div><!--post-slide end-->
					</div><!--carousel end-->
				</div><!--widget-recent-post end-->
				<div class="widget widget-adver">
					<a href="#" title=""><img src="images/resources/ad-img.jpg" alt=""></a>
				</div><!--widget-adver end-->
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
					</ul><!--catgs-links end-->
				</div><!--widget-catgs end-->
				
			</div><!--sidebar end-->
		</div>
	</div>
</div>
</section><!--main-content end-->


<?php include 'tema/footer.php'; ?>