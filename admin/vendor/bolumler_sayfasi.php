<?php include "includes/admin_header.php";
include "admin/function.php";
?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>
    
    
<div id="content-wrapper">
    <div class="container-fluid">
        <h1>Hoş Geldin.</h1>
        <hr>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Bölümün Adı</th>
                    <th>Bölümün Açıklması</th>
                    <th>Bölümün Resmi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
               
               
               
               <?php
                
                if (isset($_POST["ekle_bolum"])){
                    
                    $bolum_adi = $_POST["bolum_adi"];
                    $bolum_aciklama = $_POST["bolum_aciklama"];
                    $bolum_link = $_POST["bolum_link"];
                    $bolum_sef_link = seo($bolum_adi);
                    $bolum_resim = $_FILES["image"]["name"];
                    $bolum_resim_temp = $_FILES["image"]["tmp_name"];

                    move_uploaded_file($bolum_resim_temp, "../img/$bolum_resim");
                    
                   
                    $query = "INSERT INTO bolum_sayfasi (bolum_adi,bolum_sefurl bolum_aciklama, bolum_resim, bolum_link)";
                    
                    $query .= "VALUES('{$bolum_adi}','{$bolum_sef_link}', '{$bolum_aciklama}', '{$bolum_resim}', '{$bolum_link}')";
                    
                    $create_portfolio_query = mysqli_query($conn, $query);
                    
                }
                
               
               
                ?>
                
				 <?php 
                
                
                if (isset($_POST["duzenle_bolum"])){
                    
                    $bolum_adi = $_POST["bolum_adi"];
                    $bolum_aciklama = $_POST["bolum_aciklama"];
                    $bolum_resim = $_FILES["image"]["name"];
                    $bolum_resim_temp = $_FILES["image"]["tmp_name"];

                    move_uploaded_file($bolum_resim_temp, "../img/$bolum_resim");
                    
                    $sql_query2 = "UPDATE bolum_sayfasi SET bolum_adi = '{$bolum_adi}', bolum_aciklama = '{$bolum_aciklama}', bolum_resim = '{$bolum_resim}' WHERE bolum_id = '$_POST[bolum_id]'";
                    
                    $edit_category = mysqli_query($conn, $sql_query2);
                    echo'<meta http-equiv="refresh" content="0;URL=bolumler_sayfasi.php">';
                    
                }
            
                
                
                
                ?>
                
                
                
              
               
               
                   <?php
                
                $sql_query ="SELECT * FROM bolum_sayfasi";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $bolum_id = $row["bolum_id"];
                $bolum_adi = $row["bolum_adi"];
                $bolum_aciklama = $row["bolum_aciklama"];
                $bolum_resim = $row["bolum_resim"];
                $bolum_link = $row["bolum_link"];
                
                echo "<tr>
                    <td>{$bolum_id}</td>
                    <td>{$bolum_adi}</td>
                    <td>{$bolum_aciklama}</td>
                    <td><img src='../img/$bolum_resim' width='115px' height='80px'></td>
             
           
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Eylemler
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Düzenle</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='bolumler_sayfasi.php?delete={$bolum_id}'>Sil</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Bölüm Düzenle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="portfolio_name">Bölüm Adı</label>
                                        <input type="text" class="form-control" name="bolum_adi" value="<?php echo $bolum_adi ?>">
                                    </div>
                                       <div class="form-group">
                                        <label for="portfolio_name">Bölüm Açıklama</label>
                                        <input type="text" class="form-control" name="bolum_aciklama" value="<?php echo $bolum_aciklama ?>">
                                    </div>
                                   

                                     <div class="form-group">
                                        
                                        <img src='../img/<?php echo $bolum_resim; ?>' width='115px' height='80px'>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                            
                                    <div class="form-group">
                                        <input type="hidden" name="bolum_id" value="<?php echo $row["bolum_id"]; ?>">
                                        <input type="submit" class="btn btn-primary" name="duzenle_bolum" value="Bölümü Düzenle">
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
                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="portfolio_name">Bölüm Adı</label>
                                        <input type="text" class="form-control" name="bolum_adi">
                                    </div>
                                    
                                     <div class="form-group">
                                        <label for="portfolio_name">Bölüm Açıklama</label>
                                        <input type="text" class="form-control" name="bolum_aciklama">
                                    </div>
                            

                                    <div class="form-group">
                                        <label for="portfolio_image_sm">Bölüm Resim</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    
                                      <div class="form-group">
                                        <label for="portfolio_name">Bölüm Link</label>
                                        <input type="text" class="form-control" name="bolum_link">
                                    </div>

                                    
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="ekle_bolum" value="Ekle">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        <?php
        
        if(isset($_GET["delete"])){
            
            $del_delete_id = $_GET["delete"];
            
            $sql_guery = "DELETE FROM bolum_sayfasi WHERE bolum_id ={$del_delete_id} ";
            
            $delete_portfolios_query = mysqli_query($conn, $sql_guery);
            

            
            
        }
        
        
        ?>


            <?php include "includes/admin_footer.php"; ?>