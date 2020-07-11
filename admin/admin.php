<?php include "includes/admin_header.php"; ?>
<!--  Admin klasörü içerisindeki includes klasöründen - admin_header adlı php dosyasını çekiyoruz.  -->

<div id="wrapper">

	<?php include "includes/admin_sidebar.php"; ?>


	<div id="content-wrapper">
		<div class="container-fluid">
			<h2>Yöneticiler <small> <?php echo $_SESSION["admin_kadi"]; ?> </small></h2>
			<hr>

			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th>İd</th>
						<th>Yönetici Adı</th>
						<th>Yönetici Soyadı</th>
						<th>Yönetici Kullanıcı Adı</th>
						<th>Yönetici E-Mail</th>
						<th>Yönetici Biografi</th>
						<th>Yönetici Resim</th>
						<th>Facebook</th>
						<th>İnstagram</th>
						<th>Twitter</th>
						<th>İşlemler</th>

					</tr>

				</thead>
				<tbody>


					<?php
                
                if (isset($_POST["ekle_uye"])){
                    
                    $admin_adi = $_POST["admin_adi"];
                    $admin_soyadi = $_POST["admin_soyadi"];
                    $admin_kadi = $_POST["admin_kadi"];
                    $admin_sifre = $_POST["admin_sifre"];
                    $admin_mail = $_POST["admin_mail"];
                    $admin_bio = $_POST["admin_bio"];
                    $admin_resim = $_POST["image"];
                    $facebook = $_POST["facebook"];
                    $instagram = $_POST["instagram"];
                    $twitter = $_POST["twitter"];

                    $photoName = "admin_".rand(10,999999);

                    $photo = $_FILES['image'];

                    $handle = new Upload($photo);
                    if ($handle->uploaded) {

                        $handle->file_new_name_body = $photoName;

                        $handle->Process('../images/admin/');
                        /* Resim Yükleme İzni */
                        $handle->allowed = array('image/*');
                        if ($handle->processed) {
                            echo 'Yüklendi!';
                        } else {
                            echo 'Yükleme Hatası';
                        }

                        $handle-> Clean();

                    } else {
                        echo 'Görsel Yükleme Hatası';
                    }
                    
                   
                    $query = "INSERT INTO admin (admin_adi, admin_soyadi, admin_kadi, admin_sifre, admin_mail, admin_bio, admin_resim, facebook, twitter, instagram, admin_durum)";
                    
                    $query .= "VALUES('{$admin_adi}', '{$admin_soyadi}', '{$admin_kadi}', '{$admin_sifre}', '{$admin_mail}', '{$admin_bio}', '{$handle->file_dst_name}', '{$facebook}', '{$twitter}', '{$instagram}', 'Yönetici')";
                    
                    $ekle = mysqli_query($conn, $query);
                    if($ekle){
                        echo 'Yönetici eklendi';
                       header("Refresh: 2; url=admin.php");
                    }else{
                        echo 'Yönetici eklenemedi!';
                    }
                    $handle-> Clean();
                   }
                 
                                    

                ?>

					<?php 
                
                
                if (isset($_POST["duzenle_ayar"])){
                    
                    $admin_adi = $_POST["admin_adi"];
                    $admin_soyadi = $_POST["admin_soyadi"];
                    $admin_kadi = $_POST["admin_kadi"];
                    $admin_mail = $_POST["admin_mail"];
                    $admin_bio = $_POST["admin_bio"];
                    $facebook = $_POST["facebook"];
                    $instagram = $_POST["instagram"];
                    $twitter = $_POST["twitter"];
                    $admin_resim = $_FILES['image']['tmp_name'];
                    $admin_sifre = $_POST["admin_sifre"];
                    $image_name = '';
                    if (empty($admin_resim)){

                    	$resim_kontrol = "SELECT * FROM admin WHERE admin_id = '$_POST[admin_id]'";
                    	$resim_sec = mysqli_query($conn, $resim_kontrol);
                    	while ($row = mysqli_fetch_array($resim_sec)) {
                    		$image_name = $row["admin_resim"];
                    	}
                    }else {

	                 	$photoName = "admin_".rand(10,999999);

	                    $photo = $_FILES['image'];

	                    $handle = new Upload($photo);
	                    if ($handle->uploaded) {

	                        $handle->file_new_name_body = $photoName;

	                        $handle->Process('../images/admin/');
	                        /* Resim Yükleme İzni */
	                        $handle->allowed = array('image/*');
	                        if ($handle->processed) {
	                            echo 'Yüklendi!';
	                    		$image_name = $handle->file_dst_name;

	                        } else {
	                            echo 'Yükleme Hatası';
	                        }

	                        $handle-> Clean();

	                    } else {
	                        echo 'Görsel Yükleme Hatası';
	                    }
                    }

                    $sql_query2 = "UPDATE admin SET admin_adi = '{$admin_adi}', admin_soyadi = '{$admin_soyadi}', admin_sifre = '{$admin_sifre}', admin_kadi = '{$admin_kadi}', admin_mail = '{$admin_mail}', admin_bio = '{$admin_bio}', admin_resim = '{$image_name}', facebook = '{$facebook}', twitter = '{$twitter}', instagram = '{$instagram}' WHERE admin_id = '$_POST[admin_id]'";
                    
                    $edit_uye = mysqli_query($conn, $sql_query2);
                    echo'<meta http-equiv="refresh" content="0;URL=admin.php">';
                    
                }
                    ?>

					<?php
                
                $sql_query ="SELECT * FROM admin";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $admin_id = $row["admin_id"];
                $admin_adi = $row["admin_adi"];
                $admin_soyadi = $row["admin_soyadi"];
                $admin_kadi = $row["admin_kadi"];
                $admin_mail = $row["admin_mail"];
                $admin_bio = $row["admin_bio"];
                $admin_resim = $row["admin_resim"];
                $facebook = $row["facebook"];
                $twitter = $row["twitter"];
                $instagram = $row["instagram"];
                $admin_sifre = $row["admin_sifre"];
             
                echo "<tr>
                        
                       <td>{$admin_id}</td>
                       <td>{$admin_adi}</td>
                        <td>{$admin_soyadi}</td> 
                        <td>{$admin_kadi}</td>
                        <td>{$admin_mail}</td>
                        <td>{$admin_bio}</td>
                        <td><img src='../images/admin/$admin_resim' width='115px' height='80px'></td>
                        <td>{$facebook}</td>
                        <td>{$twitter}</td>
                        <td>{$instagram}</td>
                       
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Eylemler
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Düzenle</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='admin.php?delete={$admin_id}'>Sil</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#add_modal'>Ekle</a>
                                 
                                </div>
                            </div>
                        </td>
                    </tr>";
                
                
                
            
                ?>



					<div id="edit_modal<?php echo $k; ?>" class="modal fade">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Yöneticiyi Düzenle</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="user_name">Yönetici Adı</label>
											<input type="text" class="form-control" name="admin_adi" value="<?php echo $admin_adi ?>">
										</div>
										<div class="form-group">
											<label for="user_name">Yönetici Soyadı</label>
											<input type="text" class="form-control" name="admin_soyadi" value="<?php echo $admin_soyadi ?>">
										</div>
										<div class="form-group">
											<label for="user_name">Yönetici Kullanıcı Adı</label>
											<input type="text" class="form-control" name="admin_kadi" value="<?php echo $admin_kadi ?>">
										</div>

										<div class="form-group">
											<label for="user_name">Yönetici Şifre</label>
											<input type="text" class="form-control" name="admin_sifre" value="<?php echo $admin_sifre ?>">
										</div>
										<div class="form-group">
											<label for="user_name">Yönetici E-Mail</label>
											<input type="text" class="form-control" name="admin_mail" value="<?php echo $admin_mail ?>">
										</div>

										<div class="form-group">
											<label for="user_name">Yönetici Biografi</label>
											<input type="text" class="form-control" name="admin_bio" value="<?php echo $admin_bio ?>">
										</div>


									<div class="form-group">
	                                    <img src='../images/admin/<?php echo $admin_resim; ?>' width='115px' height='80px'>
	                                    <input type="file" class="form-control" name="image">
                                    </div>

										<div class="form-group">
											<label for="user_name">Yönetici Facebook Kullanıcı Adı</label>
											<input type="text" class="form-control" name="facebook" value="<?php echo $facebook ?>">
										</div>

										<div class="form-group">
											<label for="user_name">Yönetici Twitter Kullanıcı Adı</label>
											<input type="text" class="form-control" name="twitter" value="<?php echo $twitter ?>">
										</div>

										<div class="form-group">
											<label for="user_name">Yönetici İnstagram Kullanıcı Adı</label>
											<input type="text" class="form-control" name="instagram" value="<?php echo $instagram ?>">
										</div>



										<div class="form-group">
											<input type="hidden" name="admin_id" value="<?php echo $row["admin_id"]; ?>">
											<input type="submit" class="btn btn-primary" name="duzenle_ayar" value="Yöneticiyi Düzenle">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php $k++; } ?>
				</tbody>
			</table>


			<div id="add_modal" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Yeni Yönetici Ekle</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="user_name">Adı</label>
									<input type="text" class="form-control" name="admin_adi">
								</div>
								<div class="form-group">
									<label for="user_name">Soyadı</label>
									<input type="text" class="form-control" name="admin_soyadi">
								</div>
								<div class="form-group">
									<label for="user_name">Kullanıcı Adı</label>
									<input type="text" class="form-control" name="admin_kadi">
								</div>
								<div class="form-group">
									<label for="user_password">Şifre</label>
									<input type="text" class="form-control" name="admin_sifre">
								</div>
								<div class="form-group">
									<label for="user_email">Email</label>
									<input type="email" class="form-control" name="admin_mail">
								</div>
								<div class="form-group">
									<label for="user_email">Yönetici Biografi</label>
									<input type="text" class="form-control" name="admin_bio">
								</div>
								<div class="form-group">
									<label for="user_name">Yönetici Resim</label>
									<input type="file" class="form-control" name="image">
								</div>

								<div class="form-group">
									<label for="user_name">Facebook Kullanıcı Adı</label>
									<input type="text" class="form-control" name="facebook">
								</div>

								<div class="form-group">
									<label for="user_name">Twitter Kullanıcı Adı</label>
									<input type="text" class="form-control" name="twitter">
								</div>

								<div class="form-group">
									<label for="user_name">İnstagram Kullanıcı Adı</label>
									<input type="text" class="form-control" name="instagram">
								</div>



								<div class="form-group">
									<input type="hidden" name="admin_id" value="">
									<input type="submit" class="btn btn-primary" name="ekle_uye" value="Yönetici Ekle">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


			<?php
        
        if(isset($_GET["delete"])){
            
            $del_delete_id = $_GET["delete"];
            
            $sql_guery = "DELETE FROM admin WHERE admin_id ={$del_delete_id} ";
            
            $delete_portfolios_query = mysqli_query($conn, $sql_guery);
            echo'<meta http-equiv="refresh" content="0;URL=admin.php">';
             
        }
        
        
        ?>


			<?php include "includes/admin_footer.php"; ?>