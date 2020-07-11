<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>
    
    
<div id="content-wrapper">
    <div class="container-fluid">
        <h4>Sayfalar</h4>
        <hr>

        <table class="table table-bordered table-hover table-responsive-sm">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Sayfa Adı</th>
                    <th>Sayfa Açıklması</th>
                    <th>Sayfa İçeriği</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
               
                
                  <?php              
                
                if (isset($_POST["duzenle_yazi"])){


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
                    
                    $baslik =  addslashes($_POST["baslik"]);
                    $baslik_seo = seflink($baslik);
                    $aciklama =  addslashes($_POST["aciklama"]);
                    $icerik = addslashes($_POST["icerik"]);

                    $sql_query2 = "UPDATE sayfalar SET baslik = '{$baslik}', baslik_seo = '{$baslik_seo}', aciklama = '{$aciklama}', icerik = '{$icerik}' WHERE sayfa_id = '$_POST[sayfa_id]'";
                    
                    $edit_category = mysqli_query($conn, $sql_query2);
                    echo'<meta http-equiv="refresh" content="0;URL=sayfalar.php">';
                    
                
            }
                
                
                
                ?>
                
                
                
            
                   <?php
            
                $sql_query ="SELECT * FROM sayfalar";
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $sayfa_id = $row["sayfa_id"];
                $baslik = $row["baslik"];
                $aciklama = $row["aciklama"];
                $icerik = $row["icerik"];
                
                echo "<tr>
                    <td>{$sayfa_id}</td>
                    <td>{$baslik}</td>
                    <td>{$aciklama}</td>
                    <td>".substr($icerik, 0, 50)."...</td>
           
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Eylemler
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Düzenle</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='sayfalar.php?delete={$sayfa_id}'>Sil</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Sayfayı Düzenle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="portfolio_name">Sayfa Adı</label>
                                        <input type="text" class="form-control" name="baslik" value="<?php echo $baslik ?>">
                                    </div>

                                     <div class="form-group">
                                        <label for="portfolio_name">Sayfa Açıklama</label>
                                        <input type="text" class="form-control" name="aciklama" value="<?php echo $aciklama ?>">
                                    </div>
                                    
                                    
                                           <div class="form-group">
                <label for="portfolio_category">Sayfa İçerik</label>
                <textarea id="editor" name="icerik" id="" cols="20" rows="5"><?php echo $icerik ?></textarea>
                
            </div>
                            
                                    <div class="form-group">
                                        <input type="hidden" name="sayfa_id" value="<?php echo $row["sayfa_id"]; ?>">
                                        <input type="submit" class="btn btn-primary" name="duzenle_yazi" value="Sayfayı Düzenle">
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
            
            $sql_guery = "DELETE FROM sayfalar WHERE sayfa_id ={$del_delete_id} ";
            
            $delete_portfolios_query = mysqli_query($conn, $sql_guery);
            echo'<meta http-equiv="refresh" content="0;URL=sayfalar.php">';
            
             
        }
        
        
        ?>


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

</script>
            <?php include "includes/admin_footer.php"; ?>