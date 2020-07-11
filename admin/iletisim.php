<?php include "includes/admin_header.php"; ?>
<!--  Admin klasörü içerisindeki includes klasöründen - admin_header adlı php dosyasını çekiyoruz.  -->

<div id="wrapper">

	<?php include "includes/admin_sidebar.php"; ?>
	<!--  Admin klasörü içerisindeki includes klasöründen - admin_sidebar adlı php dosyasını çekiyoruz.  -->


	<div id="content-wrapper">
		<div class="container-fluid">
			<h2>İletişim <small> <?php echo $_SESSION["admin_kadi"]; ?> </small></h2> <!--  Bu kısımda php kodumuz ile giriş yapmış olan yöneticinin adını yazdırıyoruz.  -->
			<hr>

			<table class="table table-bordered table-hover">
				<thead class="thead-dark">

					<!--  Bu kısım bilgileri görüntüleyeceğimiz tablo -->
					<tr>
						<th>ID</th>
						<th>Gönderici Adı Soyadı</th>
						<th>Konu</th>
						<th>Mesaj</th>
						<th>E Posta</th>
						<th>İşlemler</th>

					</tr>
				</thead>
				<tbody>










					<!--  Veri tabanından İletişim adlı tabloya bağlanıyoruz ve gelen mesajları görüntülüyoruz   -->

					<?php
                
                $sql_query ="SELECT * FROM iletisim";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $mesaj_id = $row["mesaj_id"];
                $ad_soyad = $row["ad_soyad"];
                $konu = $row["konu"];
                $mesaj = $row["mesaj"];
                $email = $row["email"];
                
                echo "<tr>
                    <td>{$mesaj_id}</td>
                    <td>{$ad_soyad}</td>
                    <td>{$konu}</td>
                    <td>{$mesaj}</td>
                    <td>{$email}</td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Eylemler
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='iletisim.php?delete={$mesaj_id}'>Sil</a>
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
            
            $sql_guery = "DELETE FROM iletisim WHERE mesaj_id ={$del_delete_id} ";
            
            $delete_portfolios_query = mysqli_query($conn, $sql_guery);

            echo'<meta http-equiv="refresh" content="0;URL=iletisim.php">';  // Burası işlem yapıldığında sayfanın gideceği adres
            
            
        }
        
        
        ?>


					<!-- Admin klasörü içerisindeki includes klasöründen - Admin_footer adlı php dosyasını çekiyoruz.
              ve böylece sayfanın alt tarafında footer kısmı görüntülenmiş oluyor.  -->

					<?php include "includes/admin_footer.php"; ?>
