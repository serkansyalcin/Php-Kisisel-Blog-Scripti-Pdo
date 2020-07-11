<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

	<?php include "includes/admin_sidebar.php"; ?>


	<div id="content-wrapper">
		<div class="container-fluid">
			<h2>Kategoriler <small> <?php echo $_SESSION["admin_kadi"]; ?> </small></h2>
			<hr>

			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Kategori Adı</th>
						<th>Kategori Açıklması</th>
						<th>İşlemler</th>
					</tr>
				</thead>
				<tbody>



					<?php
            
            if (isset($_POST["kategori_ekle"])){
                function seflink($text)
               {
                $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
                $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
                $text = strtolower(str_replace($find, $replace, $text));
                $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
                $text = trim(preg_replace('/\s+/', ' ', $text));
                $text = str_replace(' ', '-', $text);
                return $text;
            }
                
                $kategori_adi = $_POST["kategori_adi"];
                $kategori_adi_seo = seflink($kategori_adi);
                $kategori_aciklama = $_POST["kategori_aciklama"];
               
                $query = "INSERT INTO kategoriler (kategori_adi, kategori_adi_seo, kategori_aciklama)";
                
                $query .= "VALUES('{$kategori_adi}', '{$kategori_adi_seo}', '{$kategori_aciklama}')";
                
                $create_portfolio_query = mysqli_query($conn, $query);
                echo'<meta http-equiv="refresh" content="0;URL=kategoriler.php">';
                                   
            }

            ?>



					<?php 
            
            
            if (isset($_POST["duzenle_kategori"])){
               
                $kategori_adi = $_POST["kategori_adi"];
                $kategori_aciklama = $_POST["kategori_aciklama"];
                
                $sql_query2 = "UPDATE kategoriler SET kategori_adi = '{$kategori_adi}', kategori_aciklama = '{$kategori_aciklama}' WHERE kategori_id = '$_POST[kategori_id]'";
                
                $edit_category = mysqli_query($conn, $sql_query2);
                echo'<meta http-equiv="refresh" content="0;URL=kategoriler.php">';
                
            }
        
            
            
            
            ?>




					<?php
            
            $sql_query ="SELECT * FROM kategoriler";
            
            $select_all_portfolios = mysqli_query($conn, $sql_query);
           $k=1;
        while ($row= mysqli_fetch_assoc($select_all_portfolios)){
            
            $kategori_id = $row["kategori_id"];
            $kategori_adi = $row["kategori_adi"];
            $kategori_aciklama = $row["kategori_aciklama"];

             echo "<tr>
                <td>{$kategori_id}</td>
                <td>{$kategori_adi}</td>
                <td>{$kategori_aciklama}</td>
                
                <td>
                    <div class='dropdown'>
                        <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Eylemler
                        </button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Düzenle</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='kategoriler.php?delete={$kategori_id}'>Sil</a>
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
									<h5 class="modal-title" id="exampleModalLabel">Kategori Düzenle</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="portfolio_name">Kategori Adı</label>
											<input type="text" class="form-control" name="kategori_adi" value="<?php echo $kategori_adi ?>">
										</div>
										<div class="form-group">
											<label for="portfolio_name">Kategori Açıklama</label>
											<input type="text" class="form-control" name="kategori_aciklama" value="<?php echo $kategori_aciklama ?>">
										</div>
										<div class="form-group">
											<input type="hidden" name="kategori_id" value="<?php echo $row["kategori_id"]; ?>">
											<input type="submit" class="btn btn-primary" name="duzenle_kategori" value="Kategoriyi Düzenle">
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
							<h5 class="modal-title" id="exampleModalLabel">Yeni Kategori Ekle</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="portfolio_name">Kategori Adı</label>
									<input type="text" class="form-control" name="kategori_adi">
								</div>

								<div class="form-group">
									<label for="portfolio_name">Kategori Açıklama</label>
									<input type="text" class="form-control" name="kategori_aciklama">
								</div>

								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="kategori_ekle" value="Ekle">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>



			<?php
    
    if(isset($_GET["delete"])){
        
        $del_delete_id = $_GET["delete"];
        
        $sql_guery = "DELETE FROM kategoriler WHERE kategori_id ={$del_delete_id} ";
        
        $delete_portfolios_query = mysqli_query($conn, $sql_guery);
        echo'<meta http-equiv="refresh" content="0;URL=kategoriler.php">';
        
         
    }
    
    
    ?>


			<?php include "includes/admin_footer.php"; ?>