<section class="recommend-posts p-75">
	<div class="container">
		<div class="sec-title">
			<h3>Popüler Yazılar</h3>
		</div>
		<!--sec-title end-->
		<div class="blog-items smaller-post">
			<div class="row">
				<div class="col-lg-6">
					<?php	
					$query = $db->query("SELECT * FROM yazilar order By hit DESC limit 3");
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
						$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=130&w=170";
						$sorgu = $db->prepare("SELECT COUNT(*) FROM yorumlar where yazi_id = '$yazi_id' ");
						$sorgu->execute();
						$say = $sorgu->fetchColumn();
							echo'<div class="blog-item">
								<div class="blog-img">
									<img src="'.$resim.'" alt="'.$baslik.'">
								</div><!--blog-img end-->
								<div class="blog-info">
									<a href="kategori/'.$kategori_adi_seo.'" title="'.$kategori_adi.'" class="post-category">'.$kategori_adi.'</a>
									<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
									<ul class="meta">
										<li>'.strftime('%d %B %Y, %A', strtotime($row['tarih'])).'</li>
										<li><i class="la la-eye"></i>'.$hit.'</li>
										<li><i class="la la-comment-o"></i>'.$say.'</li>
									</ul>
								</div><!--blog-info end-->
							</div>';
						}
					}
					?>
					<!--blog-item end-->


				</div>
				<div class="col-lg-6">
					<?php	
					$query = $db->query("SELECT * FROM yazilar order By hit DESC LIMIT 3,3");
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
						$resim="crop.php?src=".$parseurl['3']."/images/yazilar/".$resim."&h=130&w=170";
						$sorgu = $db->prepare("SELECT COUNT(*) FROM yorumlar where yazi_id = '$yazi_id' ");
						$sorgu->execute();
						$say = $sorgu->fetchColumn();
							echo'<div class="blog-item">
								<div class="blog-img">
									<img src="'.$resim.'" alt="'.$baslik.'">
								</div><!--blog-img end-->
								<div class="blog-info">
									<a href="kategori/'.$kategori_adi_seo.'" title="'.$kategori_adi.'" class="post-category">'.$kategori_adi.'</a>
									<h3 class="post-title"><a href="icerik/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></h3>
									<ul class="meta">
										<li>'.strftime('%d %B %Y, %A', strtotime($row['tarih'])).'</li>
										<li><i class="la la-eye"></i>'.$hit.'</li>
										<li><i class="la la-comment-o"></i>'.$say.'</li>
									</ul>
								</div><!--blog-info end-->
							</div>';
						}
					}
					?>
					<!--blog-item end-->

				</div>
			</div>
		</div>
	</div>
</section>
<!--recommend-posts end-->