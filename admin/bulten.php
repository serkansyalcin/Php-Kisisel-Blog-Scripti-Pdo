<?php include "includes/admin_header.php"; ?>
<!--  Admin klasörü içerisindeki includes klasöründen - admin_header adlı php dosyasını çekiyoruz.  -->

<div id="wrapper">

	<?php include "includes/admin_sidebar.php"; ?>
	<!--  Admin klasörü içerisindeki includes klasöründen - admin_sidebar adlı php dosyasını çekiyoruz.  -->


	<div id="content-wrapper">
		<div class="container-fluid">
			<h2>Haber Bülteni <small> <?php echo $_SESSION["admin_kadi"]; ?> </small></h2> <!--  Bu kısımda php kodumuz ile giriş yapmış olan yöneticinin adını yazdırıyoruz.  -->
			<hr>

			<table class="table table-bordered table-hover">
				<thead class="thead-dark">

					<!--  Bu kısım bilgileri görüntüleyeceğimiz tablo -->
					<tr>
						<th>ID</th>
						<th>Abone Email Adresi</th>
						<th>Tarih</th>
						<th>İşlemler</th>

					</tr>
				</thead>
				<tbody>










					<!--  Veri tabanından İletişim adlı tabloya bağlanıyoruz ve gelen mesajları görüntülüyoruz   -->

					<?php
                
                $sql_query ="SELECT * FROM haber_bulteni";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $email = $row["email"];
                $tarih = $row["tarih"];
                $bulten_id = $row["bulten_id"];
                
                echo "<tr>
                    <td>{$bulten_id}</td>
                    <td>{$email}</td>
                    <td>{$tarih}</td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Eylemler
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='bulten.php?delete={$bulten_id}'>Sil</a>
                                <div class='dropdown-divider'></div>
                               
                            </div>
                        </div>
                    </td>
                </tr>";
            }
           
                  ?>

					<!--  Burada veri tabanındaki mesajları siliyoruz.   -->

					<?php
        
        if(isset($_GET["delete"])){
            
            $del_delete_id = $_GET["delete"];
            
            $sql_guery = "DELETE FROM haber_bulteni WHERE bulten_id ={$del_delete_id} ";
            
            $delete_portfolios_query = mysqli_query($conn, $sql_guery);

            echo'<meta http-equiv="refresh" content="0;URL=bulten.php">';  // Burası işlem yapıldığında sayfanın gideceği adres
            
            
        }
        
        
        ?>


					<!-- Admin klasörü içerisindeki includes klasöründen - Admin_footer adlı php dosyasını çekiyoruz.
              ve böylece sayfanın alt tarafında footer kısmı görüntülenmiş oluyor.  -->

					<?php include "includes/admin_footer.php"; ?>
