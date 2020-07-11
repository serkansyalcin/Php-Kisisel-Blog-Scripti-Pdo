<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>
    
    
    <div id="content-wrapper">
        <div class="container-fluid">
            <h4>Haberler Sayfası</h4>
            <hr>

            <table class="table table-bordered table-hover table-responsive-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Yazı Başlığı</th>
                        <th>Yazı Açıklması</th>
                        <th>Yazı İçeriği</th>
                        <th>Yazı Kategorisi</th>
                        <th>Resim</th>
                        <th>Tarih</th>
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
                $kategori_adi = $_POST["kategori_adi"];
                $kategori_adi_seo = seflink($kategori_adi);
                $tarih = date('Y-m-d h-i-s');
                $resim = $_FILES['image']['tmp_name'];
                $image_name = '';

                if (empty($resim)){

                        $resim_kontrol = "SELECT * FROM yazilar WHERE yazi_id = '$_POST[yazi_id]'";
                        $resim_sec = mysqli_query($conn, $resim_kontrol);
                        while ($row = mysqli_fetch_array($resim_sec)) {
                            $image_name = $row["resim"];
                        }
                    }else {

                $photoName = "yazi_".rand(10,999999);

                $photo = $_FILES['image'];

                $handle = new Upload($photo);
                if ($handle->uploaded) {

                    $handle->file_new_name_body = $photoName;

                    $handle->Process('../images/yazilar/');
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

                $sql_query2 = "UPDATE yazilar SET baslik = '{$baslik}', baslik_seo = '{$baslik_seo}', aciklama = '{$aciklama}', resim = '{$image_name}', icerik = '{$icerik}', kategori_adi = '{$kategori_adi}', kategori_adi_seo = '{$kategori_adi_seo}',tarih = '{$tarih}' WHERE yazi_id = '$_POST[yazi_id]'";

                $edit_category = mysqli_query($conn, $sql_query2);
                echo'<meta http-equiv="refresh" content="0;URL=yazilar.php">';

                
            }



            ?>



            
            <?php
            
            $sql_query ="SELECT * FROM yazilar";
            $select_all_portfolios = mysqli_query($conn, $sql_query);
            $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){

                $yazi_id = $row["yazi_id"];
                $baslik = $row["baslik"];
                $aciklama = $row["aciklama"];
                $icerik = $row["icerik"];
                $kategori_adi = $row["kategori_adi"];
                $kategori_adi_seo = $row["kategori_adi_seo"];
                $tarih = $row["tarih"];
                $resim = $row["resim"];
                
                echo "<tr>
                <td>{$yazi_id}</td>
                <td>{$baslik}</td>
                <td>{$aciklama}</td>
                <td>".substr($icerik, 0, 50)."...</td>
                <td>{$kategori_adi}</td>
                 <td><img src='../images/yazilar/$resim' width='115px' height='80px'></td>
                <td>{$tarih}</td>



                <td>
                <div class='dropdown'>
                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Eylemler
                </button>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Düzenle</a>
                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='yazilar.php?delete={$yazi_id}'>Sil</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Yazı Düzenle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="portfolio_name">Yazı Başlık</label>
                                        <input type="text" class="form-control" name="baslik" value="<?php echo $baslik ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="portfolio_name">Yazı Açıklama</label>
                                        <input type="text" class="form-control" name="aciklama" value="<?php echo $aciklama ?>">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="portfolio_category">Yazı İçerik</label>
                                        <textarea id="editor" name="icerik" cols="20" rows="5"><?php echo $icerik ?></textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="portfolio_name">Yazı Kategori</label> 
                                        <select class="form-group form-control" name="kategori_adi">

                                            <?php 
                                            
                                            $ekle_bolum_sql = "SELECT * FROM kategoriler";
                                            $ekle_bolum_run = mysqli_query($conn, $ekle_bolum_sql);
                                            
                                            while($ekle_bolum_row = mysqli_fetch_assoc($ekle_bolum_run)){

                                               $edited_category = $ekle_bolum_row["kategori_adi"];

                                               if($ekle_bolum_row["kategori_adi"] == $row["kategori_adi"]){
                                                echo"<option selected>$edited_category</option>";

                                            } 

                                            echo"<option>$edited_category</option>";

                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <img src='../images/yazilar/<?php echo $resim; ?>' width='115px' height='80px'>
                                    <input type="file" class="form-control" name="image">
                                </div>


                                <div class="form-group">
                                    <input type="hidden" name="yazi_id" value="<?php echo $row["yazi_id"]; ?>">
                                    <input type="submit" class="btn btn-primary" name="duzenle_yazi" value="Yazıyı Düzenle">
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

        $sql_guery = "DELETE FROM yazilar WHERE yazi_id ={$del_delete_id} ";

        $delete_portfolios_query = mysqli_query($conn, $sql_guery);
        echo'<meta http-equiv="refresh" content="0;URL=yazilar.php">';


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