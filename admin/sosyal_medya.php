<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>


    <div id="content-wrapper">
        <div class="container-fluid">
                    <h2>Sosyal Medya Bilgileri  <small> <?php echo $_SESSION["admin_kadi"]; ?> </small></h2> <!--  Bu kısımda php kodumuz ile giriş yapmış olan yöneticinin adını yazdırıyoruz.  -->

            <hr>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                     
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>İnstagram</th>
                        <th>İşlemler</th>
                    </tr>
                    
                </thead>
                <tbody>
                   
                   
                   
                   
                   <?php 
                
                
                if (isset($_POST["duzenle_ayar"])){
                    
                    $facebook = $_POST["facebook"];
                    $twitter = $_POST["twitter"];
                    $instagram = $_POST["instagram"];

                    $sql_query2 = "UPDATE sosyak_medya SET facebook = '{$facebook}', instagram = '{$instagram}', twitter = '{$twitter}' WHERE sosyal_id = '$_POST[sosyal_id]'";
                    
                    $edit_uye = mysqli_query($conn, $sql_query2);
                    echo'<meta http-equiv="refresh" content="0;URL=sosyal_medya.php">';
                    
                }
                    ?>
                    
                     <?php
                
                $sql_query ="SELECT * FROM sosyal_medya";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $facebook = $row["facebook"];
                $instagram = $row["instagram"];
                $twitter = $row["twitter"];
                $sosyal_id = $row["sosyal_id"];
             
                echo "<tr>
                        
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
                                    <a class='dropdown-item' href='sosyal_medya.php?delete={$sosyal_id}'>Sil</a>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Bilgi Düzenle</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                               <form action="" method="post">
                                        <div class="form-group">
                                            <label for="user_name">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" value="<?php echo $facebook ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_name">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" value="<?php echo $twitter ?>">
                                        </div>
                                          <div class="form-group">
                                            <label for="user_name">İnstagram</label>
                                            <input type="text" class="form-control" name="instagram" value="<?php echo $instagram ?>">
                                        </div>
                                       
                                <div class="form-group">
                                    <input type="hidden" name="sosyal_id" value="<?php echo $row["sosyal_id"]; ?>">
                                    <input type="submit" class="btn btn-primary" name="duzenle_ayar" value="Bilgi Düzenle">
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
            
            $sql_guery = "DELETE FROM sosyal_medya WHERE sosyal_id ={$del_delete_id} ";
            
            $delete_portfolios_query = mysqli_query($conn, $sql_guery);
            echo'<meta http-equiv="refresh" content="0;URL=sosyal_medya.php">';
             
        }
        
        
        ?>


            <?php include "includes/admin_footer.php"; ?>