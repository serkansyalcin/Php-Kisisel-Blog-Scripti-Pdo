<?php include 'includes/db.php'; ?>
<?php include 'includes/function.php'; ?>
<?php
$actual_link = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$parseurl=explode("/",$actual_link);
$site_link = "http://localhost/blog/";
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, 'tr_TR.UTF-8');
?>



<?php
$gosterim = $db->exec("UPDATE ayarlar SET hit = hit +1");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<base href="http://localhost/blog/">
<meta name="viewport" content="width=device-width, initial-scale=1.0">




<?php
      if($parseurl[3] && $sonuclar = @$_GET['sayfa'])
      {
      	$query = $db->query("SELECT * FROM sayfalar WHERE baslik_seo = '$sonuclar'");
			if ( $query->rowCount() ){
				foreach( $query as $row ){
					$baslik = $row["baslik"];
					$baslik_seo = $row["baslik_seo"];
					$aciklama= $row["aciklama"];
        ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="assets/favicon.ico" rel="shortcut icon">
        <title><?php echo $baslik ?> | <?php echo $title['baslik']; ?></title>
        <meta name="description" content="<?php echo $aciklama ?>">
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="<?php echo $baslik ?> | <?php echo $title['baslik']; ?>" />
        <meta property="og:url" content="<?php echo $actual_link ?>" />
        <meta property="og:title" content="<?php echo $baslik ?> | <?php echo $title['baslik']; ?>" />
        <meta property="og:description" content="<?php echo $aciklama ?>" />
        <meta property="og:image" content="<?php echo $site_link ?>/image/logo.png" />
        <meta property="og:site_name" content="<?php echo $baslik ?> | <?php echo $title['baslik']; ?>" />
        <meta property="article:tag" content="Yalçın Yazılım" />
        <meta property="og:image:secure_url" content="<?php echo $site_link ?>/images/logo.png" />
        <meta name="twitter:image" content="<?php echo $site_link ?>//images/logo.png" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:description" content="<?php echo $yazi ?>" />
		<meta name="twitter:title" content="<?php echo $baslik ?> | <?php echo $title['baslik']; ?>" />
		<meta name="twitter:site" content="@<?php echo $site_adi ?>" />
		<link rel="canonical" href="<?php echo $actual_link ?>" />

        <?php
      }
  }
}


     
      else if($parseurl[3] && $sonuclar = @$_GET['kategori'])
      {

      	$query = $db->query("SELECT * FROM kategoriler WHERE kategori_adi_seo = '$sonuclar'");
			if ( $query->rowCount() ){
				foreach( $query as $row ){
					$kategori_adi = $row["kategori_adi"];
					$kategori_adi_seo = $row["kategori_adi_seo"];
					$kategori_aciklama = $row["kategori_aciklama"];
			
        ?> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="assets/favicon.ico" rel="shortcut icon">
        <title><?php echo $kategori_adi ?> | <?php echo $site_adi ?></title>
        <meta name="description" content="<?php echo $kategori_aciklama ?>">
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="<?php echo $kategori_adi ?> | <?php echo $site_adi ?>" />
        <meta property="og:url" content="<?php echo $actual_link ?>" />
        <meta property="og:title" content="<?php echo $kategori_adi ?> | <?php echo $site_adi ?>" />
        <meta property="og:description" content="<?php echo $kategori_aciklama ?>" />
        <meta property="og:image" content="<?php echo $site_link ?>/images/logo.png" />
        <meta property="og:site_name" content="Akademik Personel İlanları | <?php echo $site_adi ?>" />
        <meta property="article:tag" content="<?php echo $kategori_adi ?>" />
        <meta property="og:image:secure_url" content="<?php echo $site_link ?>/images/logo.png" />
        <meta name="twitter:image" content="<?php echo $site_link ?>/images/logo.png" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:description" content="<?php echo $kategori_aciklama ?>" />
		<meta name="twitter:title" content="<?php echo $kategori_adi ?> | <?php echo $site_adi ?>" />
		<meta name="twitter:site" content="@<?php echo $site_adi ?>" />
		<link rel="canonical" href="<?php echo $actual_link ?>" />

        <?php
      }	}
			}

      


      else
      {
        ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $title['baslik']; ?></title>
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="<?php echo $title['baslik']; ?>" />
        <meta property="og:url" content="<?php echo $actual_link ?>" />
        <meta property="og:title" content="<?php echo $title['baslik']; ?>" />
        <meta property="og:description" content="<?php echo $title['aciklama']; ?>" />
        <meta property="og:image" content="https://materyalim.net/assets/logo.png" />
        <meta name="description" content="<?php echo $title['aciklama']; ?>">
        <meta property="og:site_name" content="<?php echo $title['baslik']; ?>" />
        <meta property="article:tag" content="yalçın yazılım" />
        <meta property="og:image:secure_url" content="<?php echo $site_link ?>/images/logo.png" />
        <meta name="twitter:image" content="<?php echo $site_link ?>/images/logo.png" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:description" content="<?php echo $title['aciklama']; ?>" />
		<meta name="twitter:title" content="<?php echo $title['baslik']; ?>" />
		<meta name="twitter:site" content="@<?php echo $site_link ?>" />
		<link rel="canonical" href="<?php echo $actual_link ?>" />
		<link rel="sitemap" type="application/xml" title="Sitemap" href="<?php echo $site_link ?>/sitemap.xml" />

        <?php
      }


      ?>
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/all.min.css">
<link rel="stylesheet" type="text/css" href="js/lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="js/lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
</head>


<body>

	<div class="preloader">
		<div class="blobs">
			<div class="blob-center"></div>
			<div class="blob"></div>
			<div class="blob"></div>
			<div class="blob"></div>
			<div class="blob"></div>
			<div class="blob"></div>
			<div class="blob"></div>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
			<defs>
			    <filter id="goo">
			      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
			      <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
			      <feBlend in="SourceGraphic" in2="goo" />
			  	</filter>
			</defs>
		</svg>
	</div><!--PRELOADER END-->

	<div class="wrapper">
		
		<header>
			<div class="container">
				<div class="top-bar">
					<div class="menu-btn">
						<a href="#" title="">
							<span class="bar1"></span>
							<span class="bar2"></span>
							<span class="bar3"></span>
						</a>
					</div>
					<!--menu-btn end-->
					<nav>
						<ul>
							<li><a href="anasayfa" title="Ana Sayfa">Ana Sayfa</a></li>
							<?php 		
        $query = $db->query("SELECT * FROM sayfalar");
        if ( $query->rowCount() ){
        foreach( $query as $row ){
        	$baslik = $row["baslik"];
        	$baslik_seo = $row["baslik_seo"];
				echo'<li><a href="sayfa/'.$baslik_seo.'" title="'.$baslik.'">'.$baslik.'</a></li>';
			}
		}
		?>
							
						</ul>
					</nav>
					<!--navigation end-->
					<div class="rt-subs">
						<a class="subscribe-btn" href="iletisim" title="İletişim"><i class="la la-envelope-o"></i> İletişim</a>
						<a class="search-btn" href="#" title="Arama Yap"><i class="la la-search"></i></a>
					</div>
					<!--rt-subs end-->
					<div class="clearfix"></div>
				</div>
				<div class="bottom-header">
					<div class="container">
						<div class="logo">
							<h2><a href="anasayfa" title="<?php echo $site_adi ?>"><?php echo $site_adi ?></a></h2>
						</div><!-- logo end-->
					</div>
				</div>
				<!--bottom-header end-->
			</div>
		</header>
		<!--HEADER END-->

		<div class="side-menu">
			<a href="#" title="" class="close-sidemenu"><i class="la la-close"></i></a>
			<ul class="navigation">
				<?php 		
        $query = $db->query("SELECT * FROM sayfalar");
        if ( $query->rowCount() ){
        foreach( $query as $row ){
        	$baslik = $row["baslik"];
        	$baslik_seo = $row["baslik_seo"];
				echo'<li><a href="sayfa/'.$baslik_seo.'" title="'.$baslik_seo.'">'.$baslik.'</a></li>';
			}
		}
		?>
				<li><a href="iletisim" title="İletişim">İletişim</a></li>
			</ul>
			<!--navigation end-->
			<div class="logo">
				<h2><a href="anasayfa" title="Yalçın Yazılım"><?php echo $site_adi ?></a></h2>
			</div><!-- logo end-->
		</div>
		<!--side-menu end-->