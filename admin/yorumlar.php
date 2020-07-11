<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>
    
    
<div id="content-wrapper">
    <div class="container-fluid">
        <h4>Yorumlar Sayfası</h4>
        <hr>

        <table class="table table-bordered table-hover table-responsive-sm">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Yorum Yapan Adı</th>
                    <th>Yorum</th>
                    <th>Yorum Yapan Email</th>
                    <th>Yorum Yapılan Yazı İd</th>
                    <th>Yorum Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
               
                
                  
                
                
                
            
                   <?php
            
                $sql_query ="SELECT * FROM yorumlar";
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
            while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                
                $yorum_id = $row["yorum_id"];
                $adi = $row["adi"];
                $yorum = $row["yorum"];
                $email = $row["email"];
                $tarih = $row["tarih"];
                $yazi_id = $row["yazi_id"];
                
                echo "<tr>
                    <td>{$yorum_id}</td>
                    <td>{$adi}</td>
                    <td>{$yorum}</td>
                    <td>{$email}</td>
                    <td>{$yazi_id}</td>
                    <td>{$tarih}</td>


           
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Eylemler
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='yorumlar.php?delete={$yorum_id}'>Sil</a>
                                <div class='dropdown-divider'></div>
                            </div>
                        </div>
                    </td>
                </tr>";
                
           
                  ?>
                
            

             
                                        
          
                
                <?php $k++; } ?>
                
                
            </tbody>
        </table>

        
        
        
        <?php
        
        if(isset($_GET["delete"])){
            
            $del_delete_id = $_GET["delete"];
            
            $sql_guery = "DELETE FROM yorumlar WHERE yorum_id ={$del_delete_id} ";
            
            $delete_portfolios_query = mysqli_query($conn, $sql_guery);
            echo'<meta http-equiv="refresh" content="0;URL=yorumlar.php">';
            
             
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