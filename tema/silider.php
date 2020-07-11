<section class="blog-section">
	<div class="container">
		<div class="blog-items main">
			<div class="row">
				<?php	
				$query = $db->query("SELECT * FROM yazilar order By yazi_id DESC LIMIT 0,1");
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
						$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=505&w=820";
						$sorgu = $db->prepare("SELECT COUNT(*) FROM yorumlar where yazi_id = '$yazi_id' ");
								$sorgu->execute();
								$say = $sorgu->fetchColumn();

						echo'<div class="col-lg-8">
						<div class="blog-item main-style">
						<div class="blog-img">
						<img src="'.$resim.'" alt="'.$baslik.'">
						<a href="kategori/'.$kategori_adi_seo.'" title="'.$baslik.'" class="post-category">'.$kategori_adi.'</a>
						</div><!--blog-img end-->
						<div class="blog-info">
						<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
						<div class="met-soc">
						<ul class="meta">
						<li>'.strftime('%d %B %Y, %A', strtotime($row['tarih'])).'</li>
						<li><i class="la la-eye"></i>'.$hit.'</li>
						<li><a href="#" title="Yorum Sayısı"><i class="la la-comment-o"></i>'.$say.'</a></li>
						</ul>
						
						</div><!--met-soc end-->
						</div><!--blog-info end-->
						</div><!--blog-items end-->
						</div>';
					}
				}
				?>

				<div class="col-lg-4">
					<?php	
					$query = $db->query("SELECT * FROM yazilar order By yazi_id DESC LIMIT 1,2");
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
							$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=248&w=340";
							echo'<div class="blog-item">
							<div class="blog-img">
							<img src="'.$resim.'" alt="'.$baslik.'">
							<a href="kategori/'.$kategori_adi_seo.'" title="'.$kategori_adi.'" class="post-category">'.$kategori_adi.'</a>
							</div><!--blog-img end-->
							<div class="blog-info">
							<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.' </a></h3>

							</div><!--blog-info end-->
							</div>';
						}
					}
					?>
					<!--blog-items end-->
				</div>
			</div>
		</div>
		<!--blog-items end-->
	</div>
</section>
<!--blog-section end-->