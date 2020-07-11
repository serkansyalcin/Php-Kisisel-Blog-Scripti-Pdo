<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

	<?php include "includes/admin_sidebar.php"; ?>


<?php
$sql_query ="SELECT * FROM ayarlar";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $hit = $row["hit"];
            }
                ?>


		
	<div id="content-wrapper">

		<div class="container-fluid">
			<h2>Hoş Geldin<small> <?php echo $_SESSION["admin_kadi"]; ?> </small> </h2>
			<hr>
			<!-- Ana Sayfada görüntülenen bilgiler veren kutucuklar kısmı  -->

			<!-- 1. kutu  -->
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white bg-primary o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="far fa-clipboard"></i>
							</div>

							<?php 
                  
                  $query = "SELECT * FROM admin";
                  $tüm_yoneticiler = mysqli_query($conn, $query);
                  
                  $yonetici_sayisi = mysqli_num_rows($tüm_yoneticiler);
                  echo "<div class ='mr-5'>Yöneticiler {$yonetici_sayisi} </div>";
                  
                  
                  
                  ?>
						</div>

						<a class="card-footer text-white clearfix small z-1" href="admin.php">
							<span class="float-left">Detayları göster</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>


				<!-- 2. kutu  -->

				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white bg-warning o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="far fa-comment"></i>
							</div>

							<?php 
                  
                  $query2 = "SELECT * FROM yazilar";
                  $tum_fotograflar = mysqli_query($conn, $query2);
                  $fotograf_sayisi = mysqli_num_rows($tum_fotograflar);
                  echo "<div class ='mr-5'>Yazılar {$fotograf_sayisi} </div>";
                  
                  
                  
                  ?>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="yazilar.php">
							<span class="float-left">Detayları göster</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>




				<!-- 3. kutu  -->



				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white bg-info o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fas fa-list-ul"></i>
							</div>
							<?php

                            $query3 = "SELECT * FROM sayfalar";
                            $tum_dersler = mysqli_query($conn, $query3);
                            $dersler_sayisi = mysqli_num_rows($tum_dersler);
                            echo "<div class ='mr-5'>Sayfalar {$dersler_sayisi} </div>";



                            ?>

						</div>
						<a class="card-footer text-white clearfix small z-1" href="sayfalar.php">
							<span class="float-left">Detayları göster</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>





				<!-- 4. kutu  -->

				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white bg-danger o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="far fa-file-image"></i>
							</div>
							<?php 
                  
                  $query4 = "SELECT * FROM iletisim";
                  $tüm_yazilar = mysqli_query($conn, $query4);
                  
                  $yazi_sayisi = mysqli_num_rows($tüm_yazilar);
                  echo "<div class ='mr-5'>Mesajlar {$yazi_sayisi} </div>";
  
                  ?>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="iletisim.php">
							<span class="float-left">Detayları göster</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>




				<!-- 5. kutu  -->

				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white bg-info o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="far fa-file-image"></i>
							</div>
							<?php 
                  
                  $query4 = "SELECT * FROM yorumlar";
                  $tüm_yazilar = mysqli_query($conn, $query4);
                  
                  $yazi_sayisi = mysqli_num_rows($tüm_yazilar);
                  echo "<div class ='mr-5'>Yorumlar {$yazi_sayisi} </div>";
  
                  ?>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="yorumlar.php">
							<span class="float-left">Detayları göster</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>


				<!-- 6. kutu  -->

				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white bg-success o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="far fa-file-image"></i>
							</div>
							<?php 
                  
                  $query4 = "SELECT * FROM kategoriler";
                  $tüm_yazilar = mysqli_query($conn, $query4);
                  
                  $yazi_sayisi = mysqli_num_rows($tüm_yazilar);
                  echo "<div class ='mr-5'>Kategoriler {$yazi_sayisi} </div>";
  
                  ?>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="kategoriler.php">
							<span class="float-left">Detayları göster</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>


				<!-- 7. kutu  -->

				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white bg-primary o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="far fa-file-image"></i>
							</div>
							<?php 
                  
                  $query4 = "SELECT * FROM haber_bulteni";
                  $tüm_yazilar = mysqli_query($conn, $query4);
                  
                  $yazi_sayisi = mysqli_num_rows($tüm_yazilar);
                  echo "<div class ='mr-5'>Haber Bülteni {$yazi_sayisi} </div>";
  
                  ?>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="bulten.php">
							<span class="float-left">Detayları göster</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>

					<!-- 8. kutu  -->

				<div class="col-xl-3 col-sm-6 mb-3">
					<div class="card text-white bg-warning o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="far fa-file-image"></i>
							</div>
				  <?php   
                  $query4 = "SELECT * FROM sosyal_medya";
                  $tüm_yazilar = mysqli_query($conn, $query4);
                  
                  $yazi_sayisi = mysqli_num_rows($tüm_yazilar);
                  echo "<div class ='mr-5'>Sosyal Medya {$yazi_sayisi} </div>";
  
                  ?>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="sosyal_medya.php">
							<span class="float-left">Detayları göster</span>
							<span class="float-right">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>



<!-- 8. kutu  -->

				<div class="col-xl-6 col-sm-6 mb-3">
					<div class="card text-white bg-danger o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="far fa-file-image"></i>
							</div>
				    <?php   
                  echo "<div class ='mr-5'>Site Toplam Görüntülenme Sayısı
                  <h2> {$hit} </h2></div>";
  
                  ?>
							
                	</div>
						</div>
						
					</div>
				</div>









			</div>
			<!-- Kutuların Bitti Yer  -->
			<hr>






			<!-- Admin klasörü içerisindeki includes klasöründen - Admin_footer adlı php dosyasını çekiyoruz.
          ve böylece sayfanın alt tarafında footer kısmı görüntülenmiş oluyor.  -->

			<?php include "includes/admin_footer.php"; ?>