<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>


    <div id="content-wrapper">
        <div class="container-fluid">
                    <h2>Site Ayarları  <small> <?php echo $_SESSION["admin_kadi"]; ?> </small></h2> <!--  Bu kısımda php kodumuz ile giriş yapmış olan yöneticinin adını yazdırıyoruz.  -->

            <hr>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                     
                        <th>Site Adı</th>
                        <th>Site Açıklama</th>
                        <th>Footer Açıklama</th>
                        <th>Logo</th>
                        <th>İşlemler</th>
                    </tr>
                    
                </thead>
                <tbody>
                   
                   
                   
                   
                   <?php 
                
                
                if (isset($_POST["duzenle_ayar"])){
                    
                    $site_adi = $_POST["site_adi"];
                    $site_aciklama = $_POST["site_aciklama"];
                    $logo = $_FILES['image']['tmp_name'];
                    $footer_yazi = $_POST["footer_yazi"];
                    $image_name = '';
                    if (empty($logo)){

                        $resim_kontrol = "SELECT * FROM ayarlar WHERE ayar_id = '$_POST[ayar_id]'";
                        $resim_sec = mysqli_query($conn, $resim_kontrol);
                        while ($row = mysqli_fetch_array($resim_sec)) {
                            $image_name = $row["logo"];
                        }
                    }else {

                        $photoName = "logo";

                        $photo = $_FILES['image'];

                        $handle = new Upload($photo);
                        if ($handle->uploaded) {

                            $handle->file_new_name_body = $photoName;

                            $handle->Process('../images/');
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

                    $sql_query2 = "UPDATE ayarlar SET site_adi = '{$site_adi}', site_aciklama = '{$site_aciklama}', logo = '{$image_name}', footer_yazi = '{$footer_yazi}' WHERE ayar_id = '$_POST[ayar_id]'";
                    
                    $edit_uye = mysqli_query($conn, $sql_query2);
                    echo'<meta http-equiv="refresh" content="0;URL=site_ayar.php">';
                    
                }
                    ?>
                    
                     <?php
                
                $sql_query ="SELECT * FROM ayarlar";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $ayar_id = $row["ayar_id"];
                $site_adi = $row["site_adi"];
                $site_aciklama = $row["site_aciklama"];
                $logo = $row["logo"];
                $footer_yazi = $row["footer_yazi"];
             
                echo "<tr>
                        
                        <td>{$site_adi}</td>
                        <td>{$site_aciklama}</td>
                        <td>{$footer_yazi}</td>
                        <td><img src='../images/$logo' width='115px' height='80px'></td>

                       
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Eylemler
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Düzenle</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='site_ayar.php?delete={$ayar_id}'>Sil</a>
                                    <div class='dropdown-divider'></div>
                                 
                                </div>
                            </div>
                        </td>
                    </tr>";
                
                
                
            
                ?>

                    

                    <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ayar Düzenle</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                               <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="user_name">Site Adı</label>
                                            <input type="text" class="form-control" name="site_adi" value="<?php echo $site_adi ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_name">Site Açıklama</label>
                                            <input type="text" class="form-control" name="site_aciklama" value="<?php echo $site_aciklama ?>">
                                        </div>
                                        <div class="form-group">
                                            <img src='../images/<?php echo $logo; ?>' width='115px' height='80px'>
                                            <input type="file" class="form-control" name="image">
                                       </div>
                                        <div class="form-group">
                                            <label for="user_name">Footer Yazı</label>
                                            <input type="text" class="form-control" name="footer_yazi" value="<?php echo $footer_yazi?>">
                                        </div>
                                       

                                <div class="form-group">
                                    <input type="hidden" name="ayar_id" value="<?php echo $row["ayar_id"]; ?>">
                                    <input type="submit" class="btn btn-primary" name="duzenle_ayar" value="Ayar Düzenle">
                                </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $k++; } ?>
                </tbody>
            </table>

           
 <?php
        
        if(isset($_GET["delete"])){
            
            $del_delete_id = $_GET["delete"];
            
            $sql_guery = "DELETE FROM ayarlar WHERE ayar_id ={$del_delete_id} ";
            
            $delete_portfolios_query = mysqli_query($conn, $sql_guery);
            echo'<meta http-equiv="refresh" content="0;URL=site_ayar.php">';
             
        }
        
        
        ?>


            <?php include "includes/admin_footer.php"; ?>