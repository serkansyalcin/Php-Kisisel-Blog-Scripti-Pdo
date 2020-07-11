<section class="blog-section feat-stors sec-padding">
	<div class="container">
		<div class="sec-title">
			<h3>Son Eklenenler</h3>
		</div>
		<!--sec-title end-->
		<div class="blog-items">
			<div class="row">
				<?php	
				$query = $db->query("SELECT * FROM yazilar order By yazi_id DESC LIMIT 0,4");
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
						$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=505&w=820";
						$sorgu = $db->prepare("SELECT COUNT(*) FROM yorumlar where yazi_id = '$yazi_id' ");
						$sorgu->execute();
						$say = $sorgu->fetchColumn();
						echo'<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="blog-item">
								<div class="blog-img">
									<img src="'.$resim.'" alt="'.$baslik.'">
								</div><!--blog-img end-->
								<div class="blog-info">
									<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
									<ul class="meta">
										<li>'.strftime('%d %B %Y, %A', strtotime($row['tarih'])).'</li>
										<li><i class="la la-eye"></i>'.$hit.'</li>
										<li><i class="la la-comment-o"></i>'.$say.'</li>
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
</section>
<!--blog-section end-->