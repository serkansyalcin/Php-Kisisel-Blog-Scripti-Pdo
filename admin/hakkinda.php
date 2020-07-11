<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>
      <?php
                
                if (isset($_POST["ekle_not"])){
                    function seo($s) {
 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
 $s = str_replace($tr,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = preg_replace('/#/', '', $s);
 $s = str_replace('.', '', $s);
 $s = trim($s, '-');
 return $s;
}
                    
                  
                }

                ?>


    <?php 
                
                
                if (isset($_POST["duzenle_yazi"])){
                    
                    $baslik = $_POST["baslik"];
                    $yazi = addslashes($_POST["yazi"]);
    
                   $sql_query2 = "UPDATE hakkinda SET baslik = '{$baslik}', yazi = '{$yazi}'";
                    
                    $edit_category = mysqli_query($conn, $sql_query2);
                    
                }
            
                
                
                
                ?>

    
             
                
                
                
                  


                 <?php
                
                $sql_query ="SELECT * FROM hakkinda";
                
                $select_all_portfolios = mysqli_query($conn, $sql_query);
               $k=1;
               while ($row= mysqli_fetch_assoc($select_all_portfolios)){
                    $hakkinda_id = $row["hakkinda_id"];
                    $baslik = $row["baslik"];
                    $yazi = $row["yazi"];

                    }
            
                
                
                
                ?>

     
   
   <div class="container p-5">
       <form action="" method="post" enctype="multipart/form-data">

         
            <div class="form-group">
                <label for="portfolio_category">Başlık</label>
                <input type="text" class="form-control" name="baslik" value="<?php echo $baslik ?>">
            </div>
          
            <div class="form-group">
                <label for="portfolio_category">İçerik</label>
                <textarea id="editor" name="yazi" id="" cols="20" rows="5"><?php echo $yazi ?></textarea>  
            </div>



            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="duzenle_yazi" value="Yazıyı Düzenle">
            </div>

        </form>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

</script>
