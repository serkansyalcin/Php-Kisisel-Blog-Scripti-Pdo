-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 May 2020, 02:26:31
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_adi` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `admin_soyadi` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `admin_sifre` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `admin_kadi` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `admin_mail` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `admin_bio` text COLLATE utf8_turkish_ci NOT NULL,
  `admin_resim` text COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `admin_durum` varchar(80) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Yönetici'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_adi`, `admin_soyadi`, `admin_sifre`, `admin_kadi`, `admin_mail`, `admin_bio`, `admin_resim`, `facebook`, `twitter`, `instagram`, `admin_durum`) VALUES
(1, 'serkan', 'yalçın', '123456789', 'serkanyalcin', 'serkan.syalcin@hotmail.com', 'Full stack developer', 'admin_613375.jpg', 'serkansyalcin', 'serkansyalcin', 'serkansyalcin', 'Yönetici'),
(9, 'Demo', 'Yönetici', '123456789', 'demo', 'demo@gmail.com', 'demo admin', 'admin_280784.png', 'demo', 'demo', 'demo', 'Yönetici');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(11) NOT NULL,
  `site_adi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `site_aciklama` varchar(350) COLLATE utf8_turkish_ci NOT NULL,
  `logo` text COLLATE utf8_turkish_ci NOT NULL,
  `footer_yazi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `site_adi`, `site_aciklama`, `logo`, `footer_yazi`, `hit`) VALUES
(1, 'Kişisel Blog Scripti', 'Yalçın Yazılım Kişisel Blog Scripti', 'logo.png', 'Tüm Hakları Saklıdır.', 14);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber_bulteni`
--

CREATE TABLE `haber_bulteni` (
  `bulten_id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haber_bulteni`
--

INSERT INTO `haber_bulteni` (`bulten_id`, `email`, `tarih`) VALUES
(1, 'serkan.syalcin@hotmail.com', '2020-05-21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkinda`
--

CREATE TABLE `hakkinda` (
  `hakkinda_id` int(11) NOT NULL,
  `baslik` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `yazi` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkinda`
--

INSERT INTO `hakkinda` (`hakkinda_id`, `baslik`, `yazi`) VALUES
(1, 'Yalçın Yazılım Kişisel Blog Scripti', '<p>Yalçın Yazılım kalitesi ile geliştirdiğimiz kişisel kullanım amaçlı blog scripti sizlere..</p><p>Blog yazılarınızı kolay bir şekilde tutabilirsiniz. İhtiyaç duyduğunuzda yazıları yönetim peneli sayesinde silebilir, düzenleyebilirsiniz.</p>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `mesaj_id` int(11) NOT NULL,
  `ad_soyad` varchar(180) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(120) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`mesaj_id`, `ad_soyad`, `email`, `konu`, `mesaj`) VALUES
(83, 'serkan yalçın', 'serkan.syalcin@hotmail.com', 'deneme', 'Deneme Mesajı'),
(92, 'bora', 'asd@gmail.com', 'xcs', 'naber seko'),
(104, 'serkan yalçın', 'serkan.syalcin@hotmail.com', 'deneme mesajı', 'bu mesaj denmee amaçlı atılmıştır');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(65) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_adi_seo` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_aciklama` varchar(300) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`, `kategori_adi_seo`, `kategori_aciklama`) VALUES
(1, 'Fotoğraf', 'fotograf', 'Fotoğrafa dair her şey'),
(2, 'Günlük', 'gunluk', 'Günlük Hayatımdan Kesitler'),
(3, 'Yaşam', 'yasam', 'Yaşama Dair Her Şey'),
(4, 'Bilgi', 'bilgi', 'Kısa Kısa Bilgiler'),
(5, 'Teknoloji', 'teknoloji', 'Teknolojiye Dair Her Şey'),
(6, 'Yazılım', 'yazilim', 'Yazılıma Dair Her Şey');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `sayfa_id` int(11) NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `baslik_seo` varchar(350) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(350) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sayfa_id`, `baslik`, `baslik_seo`, `aciklama`, `icerik`) VALUES
(1, 'Hakkımda', 'hakkimda', 'Yalçın Yazılım Kişisel Blog Scripti', '<h2>Blog Scripti</h2><p>Kişisel blog scripti olarak kullanabilmeniz için tasarlandı. Gelişmiş yönetim paneli sayesinde kolayca, Yazar ekleyebilir, Yazı ekleyebilir, Düzenlemeler yapabilir, Yazılara gelen yorumları yönetebilirsiniz.</p><h3>Hangi Altyapı?</h3><p>Php + Pdo kullanıyoruz. Hiç bir kod yazmadan kolayca kullanabilmeniz için tasarlandı.</p><h3>Neler Sunuyor?</h3><p>Açık kaynak olması sebebiyle, Scripti dilediğiniz gibi geliştirebilir, amacınıza yönelik farklı bir tasarım entegre edebilirsiniz.&nbsp;</p>'),
(2, 'Gizlilik', 'gizlilik', 'Script Kullanımı Ve Geliştirilmesi', '<p>Script açık kaynak kodlu olarak satışa sunulmuştur. Dilediğiniz gibi geliştirebilir ve güncelleyebilirsiniz.</p>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_gosterim`
--

CREATE TABLE `site_gosterim` (
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sosyal_medya`
--

CREATE TABLE `sosyal_medya` (
  `sosyal_id` int(11) NOT NULL,
  `facebook` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sosyal_medya`
--

INSERT INTO `sosyal_medya` (`sosyal_id`, `facebook`, `instagram`, `twitter`) VALUES
(1, 'yalcinyazilim', 'yalcinyazilim', 'yalcinyazilim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE `yazilar` (
  `yazi_id` int(11) NOT NULL,
  `baslik` varchar(350) COLLATE utf8_turkish_ci NOT NULL,
  `baslik_seo` varchar(450) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(450) COLLATE utf8_turkish_ci NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL,
  `kategori_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_adi_seo` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `yazar` varchar(65) COLLATE utf8_turkish_ci NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`yazi_id`, `baslik`, `baslik_seo`, `icerik`, `aciklama`, `resim`, `kategori_adi`, `kategori_adi_seo`, `tarih`, `yazar`, `hit`) VALUES
(1, 'İstanbul Sokaklarında bir kedi', 'istanbul-sokaklarinda-bir-kedi', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam illo, eveniet, maiores modi veritatis minus repellendus repellat aspernatur ratione. Similique magni id vero, dicta, ipsum molestiae dolorem soluta vel voluptas?</p>', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, labore!', 'yazi_715608.jpg', 'Fotoğraf', 'fotograf', '2020-05-22 01:41:52', 'serkanyalcin', 19),
(2, 'Çalışma Masasından ', 'calisma-masasindan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam illo, eveniet, maiores modi veritatis minus repellendus repellat aspernatur ratione. Similique magni id vero, dicta, ipsum molestiae dolorem soluta vel voluptas?\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, labore!', 'ev.jpg', 'Günlük', 'gunluk', '2020-05-21 22:51:29', 'serkanyalcin', 5),
(3, 'Gece Fotoğrafçılığı', 'gece-fotografciligi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam illo, eveniet, maiores modi veritatis minus repellendus repellat aspernatur ratione. Similique magni id vero, dicta, ipsum molestiae dolorem soluta vel voluptas?\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, labore!', 'heykel.jpg', 'Fotoğraf', 'fotograf', '2020-05-21 22:16:48', 'serkanyalcin', 21),
(4, 'Depresyon veya Psikolojik Bunalımdan Korkma: İnsan, Kendisiyle Olan Savaştan Daima Galip Çıkar!', 'depresyon-veya-psikolojik-bunalimdan-korkma-insan-kendisiyle-olan-savastan-daima-galip-cikar', '<h2>Ondan Ayrıldığım Akşam, Hayatımın En Büyük Kumarını Oynadığımı Henüz Bilmiyordum!</h2><p>O da kim?</p><p>Onun adı: Norm.</p><p>Diğer bir deyişle, <strong>toplum normalleri</strong>.</p><p>Kendim de dahil, şu davranışı çokça insanda gördüm: Yolunda giden hayatında bir anda bocalamak ve dışarıdan bakınca anlamsız gibi görünen kararlar almak; anlamsız kaygılara kapılmak veya anlamsız işler yapmaya başlamak…</p><p>Peki, “anlam” dediğimiz şey tam olarak nedir?</p><p>Neyi anlamlı, neyi anlamsız buluyoruz?</p><p>İşte, tam bu noktada toplum normları devreye giriyor.</p><p>Genel bakış açısına göre anlamlandırması güç düşüncelere sahip olduğumuzda veya anlamlandırması güç işlere kalkıştığımızda duygularımız “anormal” yaftası yiyor.</p><p>Sanırım, psikolojik sorunların ve bunalımların temeli bu sözcükte gizli: <strong>Anlam verememek! </strong></p><p>Hint sinemasının başyapıtlarından bir olan “<strong>Her Çocuk Özeldir</strong>” filmini hatırladım. Sadece çocuklar değil; her insan özeldir.</p><p>Duygular özeldir!</p><p>Bu nedenle, yaşadığımız duyguların toplum normallerine uyup uymadığını test etmek büyük bir hata olsa gerek. Başkaları için basit bir problemin bizim için hayattan soğutacak düzeyde bir problem olmasını “anormallik” olarak yorumlamak doğru değil.</p><p>Size, <strong>Paulo Coelho</strong>‘nun “<strong>Aldatmak</strong>” isimli kitabının arkasındaki yazıdan ve bazı örnek durumlardan bahsedeyim.</p><p>Elbette bu yazının konusu veya öznesi ben değilim ancak her yazar gibi ben de kendi deneyimlerimden yola çıkarak örnekler vereceğim. Dolayısıyla, örnekler arasında kendimden bahsettiğim satırları da mazur görün lütfen.</p><p>Mutlaka kendinizden bir şeyler bulacağınızı düşünüyorum.</p><h2>Şımarık Depresyonlar Yaşadım(!)</h2><p>İş hayatına çok erken yaşta atıldım ve genellikle yönetici pozisyonlarına layık görülerek iyi bir kariyer edindim. Her ne kadar geç kalmış gibi görünsem de çocukken bolca övgü alan resim ve yazım yeteneklerimi yeniden parlatmaya karar verdim. Resim konusunu bir köşeye park etsem de yazı yazmaktan hiç vazgeçmedim. Toplumun saygı duyduğu, eğitmenlerin sıkça tavsiye ettiği meslekler üzerine akademik eğitim alsam da asıl ilgi alanıma, yazarlığa geri dönmeyi başardım ve bu alanda da iyi bir kariyer edindim.</p><p>Yani hayatım; kariyer ve ekonomi yönünden iyi gitti.</p><p>Yaşıtlarıma oranla “vitaminsiz” kategorisine uygun olan kilom, hafif kambur iskeletim ve Fatih Sultan Mehmet’i andıran kemerli burnuma rağmen; hem çok güzel sevgililerim oldu hem de çok güzel ve olgun bir kadınla, jübile tadında bir evliliğim oldu. Sonrasında, dünyalar tatlısı bir oğlumuz…</p><p>Kısacası, dışarıdan bakınca imrenilecek bir hayatım olduğunu inkar etmiyorum.</p><p><strong>FAKAT!</strong></p><p>Fakat sonrasında, birçoklarının “rahatlık götüne mi battı?” sorusuyla yargılayabileceği, bir takım sorunlar yaşamaya başladım.</p><p>Evliliği, gizli kuralları olan bir tür kafes gibi görmek, çocuk sahibi olmayı ise ayak bağına sahip olmak gibi yorumladım. İçimdeki özgür ruhun ne kurallara ne de engellenmeye tahammülü olmadığını fark ettim!</p><p>Birileri buna “abazanlık” dedi.</p><p>Birileri “şükürsüzlük” dedi.</p><p>Birileri başka şeyler söyledi ama pek az insan, samimi bir şekilde, “seni anlıyorum” diyebildi.</p><p>Biliyor musunuz: Kibirli olmanın tek faydalı yönü, otoritesine saygı duymadığınız insanların neler düşündüğünü dikkate almamaktır. Hatta onların fasulyeden bile küçük bir beyne sahip olduğuna içten içe inanmaktır. Şahsen, derecesi tartışmaya açık olan kibrimin bana sağladığı tek fayda bu olmuştur: Bazılarını ciddiye almamak!</p><p>Yakın dostumun, çocukluk arkadaşımın bir sloganı aklıma gelir. Şöyle der dostum:</p>', '“Psikolojik sorunlar yaşıyor, bunalım veya depresyon geçiriyorsan mutlaka okumalısın. Emin ol bu yazıda, klişe tesellilerden çok daha fazlasını bulacaksın.”', 'yazi_87658.png', 'Günlük', 'gunluk', '2020-05-22 01:51:41', 'serkanyalcin', 7),
(5, 'Can Sıkıntısına Kesin Çözüm!', 'can-sikintisina-kesin-cozum', '<h2>Can Sıkıntısına Kesin Çözüm!</h2><p>Avrupa yakasından Anadolu yakasına geçiyorduk. Malum, yol uzun olmasa da süre uzun. Muhabbet etmeden vakit geçmez. Lanet olsun ki, boş vakitlerin ilacı olan boş konuşma melekesinden yoksunum. Sakın ola kendimi övdüğüm zannedilmesin. Doğru yerde ve doğru zamanda yapılan her iş gibi, boş konuşmak da zamanına bağlı olarak büyük meziyet doğrusu.</p><p>Misal: Uzun zamandır görüşmediğin bir arkadaşınla buluşacaksın. Görüşemediğiniz süre ne kadar çoksa ikinizi ilgilendiren konuların miktarı o kadar az olur. Hal böyle olunca, havadan sudan konuşmak lazım gelir. Oraların hava durumuyla buraların hava durumu rapor edildikten sonra joker hakkı kullanılır:</p><p>“Ee başka ne var ne yok?”&nbsp;</p><p>“Ne olsun işte aynı. Seni sormalı”</p><p>“N’olsun, bizde de aynı işte”</p><p>İnsan, bu gereksiz diyaloğa neden girer? Çünkü sessizlik, tedirgin edicidir. Sessizlik başladığı anda iç seslerin çenesi düşer.</p><p>Senin iç sesin:<br>“Bir konu açmam lazım yoksa sıkıldığımı zannedecek…”</p><p>Onun iç sesi:<br>“Ne sorsam, ne anlatsam şimdi? Hay Allah! Keyif almadığımı düşünecek…”</p><p>Gördün mü? Sosyal bir ortamda sessiz kalmak herkes için rahatsız edicidir. O yüzden kendi payıma, çok rahatsız edici bir insan olduğumu düşünürüm hep. Yeri gelince boş konuşmayı da bilmeli insan. Öyle değil mi?</p><p>Neyse ki her zaman boş konuşmak zorunda değiliz. Konu ben veya sen (karşımdaki) olmak zorunda değilse seçeneğimiz çok. Yine de o konuların, bana veya sana temas etmesi şart. Yoksa kim ipler; doğada bulunmayan tetranitratoksikarbon maddesinin laboratuvar ortamında sentezlenebilmesini?&nbsp;</p><p>Bu düşünceden yola çıkarak, boş olmayan, aksine; üzerinde tartışan her insana faydalı olabilecek bir konuyu attım ortaya.&nbsp;</p><h2><strong>Konumuz</strong>: Sık Tekrar Eden Can Sıkıntısı, Nedeni ve Çözümü</h2><p>Bir dünya psikolojik terimler eşliğinde can sıkıntısının nedenlerini sorgulayan bir cümle çıkıverdi ağzımdan. Çok sevgili ağabeyim: Afyon’un gülü, şirketimizin CEO’su, yurdumuzda nadir görülen aydınlardan biri ve küçük şeylerden mutlu olabilenlerin en küçüğü; önce başını kaşıdı. Gözlerini, önündeki aracın plakasından kaldırıp en uzak noktadaki arabaya dikti. Anladım ki, felsefi veya bilimsel bir yorum gelmek üzere. Bir süre sessizlik oldu. Ben de çıt etmeyip düşünmesine müsaade ettim.&nbsp;</p><p>“Can sıkıntısı mı?”</p><p>“Evet abi”</p><p>“Canın sıkılınca ne yap biliyor musun?”</p><p>Ne yapayım, anlamına gelen bir bakış attım.</p><p>“Götünü parmakla”</p><p>Ben, patlattım kahkahayı. Bu şakayı ilk kez duymamıştım tabii. Keza çok kez duyduğumdan mütevellit, bir o kadar daha iştahlı gülmüşüm. Anlamıştım çünkü, seviyesiz şakalar yapan tipleri tiye alan bir tür mizansen yapıyordu. Herhalde yani, ne sandın? Mühendislik mektebinden mezun, üniversitede araştırma görevlisi, girişimci ve entelektüel birinin, ciddi ciddi, parmak atmalı reçete yazmayacağını veya bunu şaka malzemesi yapmayacağını tahmin edersin değil mi?</p><p>Nitekim, hunharca kahkaham, stop etmek üzere olan motor sesine evrilmek üzereyken yüzüne baktım. Asıl yorumunu beklediğimi belli ettim.</p><p>Yüzüme baktı. Önüne baktı. Yüzüme baktı. Tekrar önüne baktı.</p><p>Anladım ki şaka yapmıyor.&nbsp;</p><p>Fakat…&nbsp;</p><p>Nasıl yani?&nbsp;</p><p>Ciddi ciddi bunu mu öneriyor? Hangisi olacağına henüz karar vermediğim parmağımı anüsümden içeri mi sokmalıyım? Tamam, yüksek promile ulaştığım zamanlarda böyle bir şeyi hiç düşünmedim değil ama hedefe kendi anüsümü hiç koymamıştım doğrusu.</p><p>Sonra yine sessizlik oldu. O sırada ben, kafamı karşı şeride çevirmiş, ters yöne akan trafiği izlerken “AVRASYA TÜNELİ’NE HOŞ GELDİNİZ” tabelasını da kaçırmışım. Ne önemi var derseniz; ne bileyim, hızlı geçiren bir tünele yaklaşınca şımartılmak istiyor insan.</p><p>Tünelden çıkınca maddi, manevi aydınlandım:</p><p>Parmaklı reçete, can sıkıntısına çözüm değilse de bir tepkinin dile geliş biçimiydi aslında. Adamın sıkılmaya bile zamanı yok ki, empati yapabilsin.</p><p>Tabii ya!&nbsp;</p><p>Sorumlulukları senden katbekat fazla olan biriyle can sıkıntısının nedenleri üzerine sohbet etmeye kalkarsan, boş muhabbet etmeyi de başarmış olursun aslında.&nbsp;</p><p>Ben de öyle değil miyim? Liseli kuzenim gelip de küçük dünyasının küçücük –<i>ona göre çok büyük</i>– problemlerinden bahsettiğinde, benzer tepkiler vermiyor muyum? Manitasıyla arası bozukmuş, internetinin hızından memnun değilmiş, canı çok sıkkınmış… Gitsin götünü parmaklasın puşt herif.</p>', 'Misal: Uzun zamandır görüşmediğin bir arkadaşınla buluşacaksın. Görüşemediğiniz süre ne kadar çoksa ikinizi ilgilendiren konuların miktarı o kadar az olur. Hal böyle olunca, havadan sudan konuşmak lazım gelir. Oraların hava durumuyla buraların hava durumu rapor edildikten sonra joker hakkı kullanılır:', 'yazi_438092.jpg', 'Günlük', 'gunluk', '2020-05-22 02:44:06', 'serkanyalcin', 87),
(6, 'Yalnızlık Üzerine Kısa Öykü', 'yalnizlik-uzerine-kisa-oyku', '<p><strong>Yalnızlık Nedir?</strong></p><p>Yalnızlık: Sosyal çevre veya duygu, durum, düşünce yönünden tek başınalıktır. Bazen tercih, bazen mecburiyet, bazense bir sanrıdan ibaret olan yalnızlık, insanın duygusal açlık yaşamasına da sebep olur.</p><h2>Yalnızlık Üzerine Kısa Öykü</h2><p>Sanki, gizli bir kanunla sabitlenmiş gibi, her evde televizyon kanalları “Ülke 1 TV”den başlıyor. On beşinci kanaldan sonrası ise, kalitesiz yayınlar yüzünden gezinme hevesi bırakmıyor insanda. Kimileri yirminci kanala kadar sabretse de genellikle on altı, bilemedin on yedinci kanala gelenler,&nbsp; kumandanın iki numaralı tuşuna basıp başa dönüyor.&nbsp; Son on beş dakika içerisinde bunu tam üç kez yapan Yakup da böyle düşünmüş olmalı ki, sonunda pes etti.&nbsp;</p><p>Elindeki kumandayı, oturduğu üçlü koltuğun, minderi çökmüş olan diğer köşesine atıp, yanı başında duran solgun sehpanın üzerindeki sigara paketine baktı. Şu tütün; boğazın tahriş oluncaya dek içsen de beklentiyi karşılamıyor olmalı. Anlaşılan o ki, can sıkıntısının ilacı tütün değil. Televizyon hiç değil! Severek aldığı, oturma odasındaki tek sanatsal nesne olan o tablo: Boyası çatlak duvarla bir bütün olmuş ve zamanla görünmeme özelliği kazanmış gibi. Peki ya üşüdükçe ayaklarını örttüğü tozlu battaniyesi. Sahi, battaniye nerede? Sahibiyle oyun oynama beklentisini çoktan unutmuş, miskin bir köpek gibi duruyor koltuğun önünde. Yine yere düşmüş, yine tozları emiyor lanet olasıca.</p><p>Yakup, sözde yalnızlıktan keyif alan, hem işine hem de içine kapanık, yirmi yedi yaşında bir genç. Gerçi, görenler kırk yaşına merdiven dayadığını düşünürler; o ayrı. Sürekli kaşlarını çatmaktan alnına sabitlediği kırışıklar, yüzünün değişmez bir parçası olup çıkmış. Sivri burnu ise, yüzü çöküp göz altları şişen, zayıf dedeler gibi, ilk bakışta “ben buradayım” diyor. Neyse ki saçları yerinde. Şayet başının tepesi de açılmış olsaydı, yirmi yedi yaşında olduğuna kimseyi inandıramazdık. Çok değil; dört yıl önce, 16 nisan sabahı, adına “radikal” dediği kararıyla taşınmıştı bu apartman dairesine; yalnızlığın kendisine iyi geleceğini umut ederek. Fakat şimdi, boş duvarlara bakıp bir sigara daha içmek üzere balkona çıktığı ve bunun sürekli tekrar ettiği, sonsuz döngüden ibaret olan hayatını sorgular gibi oldu. Bu sorgu, bir sigarayı daha gerektiriyor olmalıydı ki, yerdeki battaniyeyi koltuğun üzerine alıp sehpadaki sigara paketinden bir dal çekerek balkona çıktı.&nbsp;</p>', 'Yalnızlık: Sosyal çevre veya duygu, durum, düşünce yönünden tek başınalıktır. Bazen tercih, bazen mecburiyet, bazense bir sanrıdan ibaret olan yalnızlık, insanın duygusal açlık yaşamasına da sebep olur.', 'yazi_283266.jpg', 'Yaşam', 'yasam', '2020-05-19 00:00:00', 'serkanyalcin', 3),
(7, 'BLOG YAZARI OLMAK MI, YOUTUBER OLMAK MI?', 'blog-yazari-olmak-mi-youtuber-olmak-mi', '<p>Bu metnin <strong>gelişme</strong> bölümü için güzel cümleleri aklımda tutarken <strong>giriş</strong> bölümünü yazmakta çok zorlanıyorum. Her şeyden önce, “<strong>yazar olmak</strong>” denildiğinde ne anladığımız çok önemli. Yahut, illa bir sıfata sahip olmak gerekmez. “<strong>Yazmak</strong>” denildiğinde ne anladığımızı da konuşabiliriz.</p><p>Bu yazı, YouTube camiasina açılmış bir savaş değildir. Şayet bu, basit ama önemli bir konu.</p><p>Ne idiği belirsiz bir yazıyı okumaktansa ne olduğu belli bir videoyu izlemeyi elbette tercih ederim. Öte yandan, ne idiği belirsiz bir videoyu izlemektense ne olduğu belli bir yazıyı okumayı elbette tercih ederim.</p><p>Aslında bu yazı, “yazar mı yoksa video içerik üreticisi mi olsam?” diye bocalayanların veya bu iki mesleği birbiriyle mukayese edenlerin, sağlıklı karar vermesine yardımcı olma umuduyla yazılmıştır. Genellikle bloggerların bu ikilemde kaldığını düşünürsek, blog yazarlığından YouTube’a transfer olma düşüncesini, yazar penceresinden ele alalım.</p><p>Tartışmanın buralara kadar gelmesine&nbsp;sebep olan trendler öylesine önemsiz ki, bu önemsiz ayrıntılardan doğan önemli bir tartışmaya giriş yapmak zor oldu.</p>', 'Bu metnin gelişme bölümü için güzel cümleleri aklımda tutarken giriş bölümünü yazmakta çok zorlanıyorum.', 'yazi_502056.jpg', 'Bilgi', 'bilgi', '2020-05-19 00:00:00', 'serkanyalcin', 8),
(8, '10 Adımda Hayal Kurmanın Faydaları', '10-adimda-hayal-kurmanin-faydalari', '<p>Takvimler 25 Mayıs 1961’i gösterirken ABD Başkanı John F. Kennedy oldukça iddialı bir şey söyledi:</p><blockquote><p><i>“<strong>Ay’a astronot göndermek için beklememiz gereken süre, 10 yıldan daha az.</strong>“</i></p></blockquote><p>Ekip halinde hayal kurmanın faydaları bu noktada devreye girdi ve Kennedy’nin açıklamasından yalnızca 8 sene sonra Apollo 11, Ay’a indi. Bu, insanlığın ay ile ilk temasıydı ve Buzz Aldrin ile birlikte bu tarihi anı paylaşan Neil Armstrong heyecanını şu sözlerle ifade ediyordu</p><p>Hayal kurmak, başarılması planlanan ve arzulanan bir şeyin ilk ve belki de en önemli adımıdır. Aşağıda, hayal kurmak ile ilgili kurmaca bir hikaye var ve muhtemelen bir kısmı size de tanıdık gelecektir.</p><p>Topuklarımın sert zeminde çıkardığı sesten kendimi aldığımda kendimi büyük bir sahnede buluyorum. Heyecandan kızarmaya başlarken, sahnenin parlak ışıkları gözlerimi alıyor. Umduğumdan çok daha kalabalık bir kitle beni ayakta alkışlıyor ve bana hayranlık dolu gözlerle bakan birkaç kişiyle göz göze geliyorum. Alkışlar çok kuvvetli ve sunucunun adımı söylemesiyle midemde kelebekler kondukları dallarından havalanmaya başlıyor. Yanaklarımın acımaya başladığını ve hemen akabinde ağzımın kulaklarıma vardığını fark ediyorum ve aniden bilgisayarım haftalar öncesinden kurduğum bir hatırlatıcı için ötmeye başlıyor ve kendimi salonda oturmuş, bilgisayar başında çalışırken buluyorum. Hemen aklımı topluyor ve çalışmaya devam ediyorum.</p><p>Hepimiz bir tatile çıkmanın kanıtlanmış faydalarının birçoğunu biliyoruz. Sürekli olarak ve acı verici bir şekilde, bir işi tamamlamaya veya yöneticilerimizi memnun etmeye çalışmanın verimliliğimiz, yaratıcılığımız, performansımız ve hatta sağlığımız üzerinde olumsuz etkileri olduğunu hatırlıyoruz. Peki, her yıl birkaç gün de olsa tatile çıkarak bu kanıtlanan faydalardan yararlanmamız mümkün olabilir mi?</p><p>Hayal kurmak genellikle hayal gücümüzün arzuladığı bir evreni görselleştirmek olarak tanımlanıyor ve yapılan akademik araştırmalar hayal kurmanın faydalarının minik bir tatile çıkarak elde edilen faydalarla birebir aynı şeyler olduklarını ortaya koyuyor!</p>', 'Takvimler 25 Mayıs 1961’i gösterirken ABD Başkanı John F. Kennedy oldukça iddialı bir şey söyledi:', 'yazi_771693.jpg', 'Bilgi', 'bilgi', '2020-05-22 01:43:04', 'serkanyalcin', 5),
(9, 'macOS’te AirDrop Nasıl Kullanılır?', 'macos-te-airdrop-nasil-kullanilir', '<p>MacBook sahibi olmanın en kıyak yanlarından biri, dosya transferi için bin dereden su getirmek zorunda kalmıyor olmanız.</p><p>Açıkçası bir editör ve metin yazarı olarak, içerik hazırlarken AirDrop yükümü inanılmaz hafifletiyor.</p><p>Peki, Mac üzerinden AirDrop’u nasıl açarız ve nasıl kullanırız?</p><p>Tıpkı iOS cihazlarda olduğu gibi Mac üzerinde, AirDrop’u kullanabilmeniz için <strong>Wi-Fi ve Bluetooth’un aktif olması gerekiyor</strong>.</p><p>Mac’de AirDrop üzerinden dosya almak için yapmanız gereken&nbsp;<strong>Finder</strong>’ı açtıktan sonra sol köşedeki bardan AirDrop’u seçmek ve gönderilecek dosyayı beklemek. AirDrop ile aldığınız dosyalar Mac’inizdeki&nbsp;<strong>“İndirilenler”</strong>&nbsp;klasörüne yerleştirilecektir.</p><p>Dosya göndermek için ise AirDrop penceresindeyken, görünen cihazınızın simgesinin üzerine tut ve sürükle mantığıyla göndermek istediğiniz dosyayı sallayabilirsiniz.</p><p>&nbsp;</p>', 'MacBook sahibi olmanın en kıyak yanlarından biri, dosya transferi için bin dereden su getirmek zorunda kalmıyor olmanız.', 'yazi_156732.jpg', 'Teknoloji', 'teknoloji', '2020-05-22 01:59:02', 'serkanyalcin', 99),
(10, 'Taşıma Katmanı Protokolleri', 'tasima-katmani-protokolleri', '<h2>İstemci - Sunucu İlişkisi</h2><p>İnsanlar her gün başkalarıyla iletişim kurmak ve rutin görevlerini yerine getirmek için ağ ve internet üzerinden sağlanan hizmetleri kullanmaktadır. En yaygın kullanılan internet uygulamalarının çoğu, birçok farklı sunucu ve istemci arasındaki karmaşık etkileşimlere dayanır.  <br> <br>Sunucu, ağa bağlı diğer konak bilgisayarlara bilgi veya hizmet sağlayan bir yazılım uygulamasını çalıştıran konak bilgisayarı ifade eder.   <br> <br>İstemci ise, sunucunun bilgi veya hizmetini talep eden bilgisayarları ifade eder.  <br> <br>Bir web sayfası incelenirkenkullanıcının bilgisayarı ve web tarayıcısı, istemci olarak adlandırılır. Web sayfasını, veritabanlarını ve uygulamaları üzerinde barındıran gelişmiş bilgisayarlar da sunucu olarak adlandırılır.Web tarayıcısı, web sunucusundan bir istekte bulunur ve sunucu istenen bilgileri toplar ve onu bir web sitesi şekline getirerek web tarayıcısına geri yollar. Kullanıcılar da ekranda web sitesini görmüş olur.Bu karmaşık etkileşimlerin gerçekleşmesini sağlayan en önemli faktör, tümünün üzerinde anlaşılmış standartları ve protokolleri kullanmasıdır.  <br> <br>İstemci/sunucu sistemlerinin en önemli özelliği, istemcinin sunucuya bir istek göndermesi ve sunucunun istemciye bilgiyi geri göndermek gibi bir işlev yürüterek yanıt vermesidir. Web tarayıcısı ve web sunucusu bileşimi büyük olasılıkla en yaygın kullanılan istemci/sunucu sistemi örneğidir.  </p><p>Ağ üzerinde sadece web sunucuları bulunmaz. Dosya aktarımı için FTP sunucular, IP adresi dağıtımı için DHCP sunucular, web sitelerinin IP adresini bulmak için DNS sunucular, e-posta alıp göndermek içinde e-posta sunucuları da ağ üzerinde yer alan sunucular arasındadır.</p><h3>Taşıma Katmanı Protokolleri</h3><p>TCP/IP’de taşıma katmanı için TCP ve UDP olmak üzere iki protokol tanımlıdır. TCP bağlantı temelli bir protokoldür. Bu yüzdengönderici ve alıcı, veri iletişimi başlamadan önce iki taraf iletişim yapma konusunda istek ve onaylı mesajlarını birbirlerine gönderir. UDP ise bağlantısız basit bir protokoldür. Bu protokolde iletişim başlamadan önce gönderici ve alıcı arasında paket alışverişi yoktur. </p><h3>TCP Nedir?</h3><p>Gelişmiş bilgisayar ağlarında ve paket anahtarlamalı bilgisayar iletişiminde, kayıpsız veri gönderimi sağlayabilmek için TCP protokolü kullanılmaktadır. HTTP, HTTPS, POP3, SMTP ve FTP gibi protokollerin veri iletimi TCP aracılığıyla yapılır. TCP aşağıdaki işlemleri gerçekleştirir.  </p>', 'Sunucu, ağa bağlı diğer konak bilgisayarlara bilgi veya hizmet sağlayan bir yazılım uygulamasını çalıştıran konak bilgisayarı ifade eder', 'yazi_718713.png', 'Yazılım', 'yazilim', '2020-05-22 01:50:59', 'serkanyalcin', 118),
(11, 'Kullanıcı Deneyimi Tasarımı', 'kullanici-deneyimi-tasarimi', '<h2>Kullanıcı Deneyimi Tasarımı Nedir?</h2><p>Kullanıcı deneyimi kavramı, kullanmakta olduğunuz ürün (teknoloji) veya hizmetler ile olan iletişim veya karşılıklı etkileşiminizle ilgili bir kavramdır. Kısaca, bu ürün ve hizmetleri kullanırken ve kullanmaya devam ederken nasıl hissettiğiniz, kullanıcı deneyimi tasarımının odak noktasıdır.</p><p>Adından da anlaşılacağı üzere <strong>kullanıcı deneyimleri</strong>, ürün veya hizmete yönelik tasarım sürecinin ayrılmaz bir parçasıdır. Aslında, bir şeyler ters gitmedikçe veya kullanımdan kaynaklanan bazı sorunlar yaşanmadıkça, genelde kullanıcılar bu deneyimleme sürecinden çok da haberdar değildir. <strong>Kullanıcı deneyimi tasarımı,</strong> ürün veya hizmetlerin estetik özelliklerinden işlevlerine kadar tüm yönleri ile kullanıcıyı memnun edecek ve olası sorunları en düşük düzeye indirecek tasarım endişelerinden ve deneyimlerinden oluşan bir alandır.&nbsp;</p><p>Tasarım bakış açısı, kullanıcı deneyimlerini en az görsel kimlik özellikleri kadar önemser. Ürün ya da hizmetiniz nasıl gözükürse gözüksün, kullanıcılar onunla nasıl etkileşim kuracaklarını bilemedikleri sürece pek de bir işe yaramayacaktır. Bunun da ötesinde, kullanıcılar tüm bu etkileşim deneyiminden zevk almalıdırlar.<br>Kullanılan ürün/hizmet ne kadar yararlı ve kullanışlı? Ne kadar değerli ve kullanıcıda ne ölçüde istek uyandırıyor? Kolay bulunabiliyor mu? Kolay erişim sağlanıyor mu? Peki güvenilir ve inandırıcı mı? İşte tüm bu sorular, ürün ya da hizmetinizle birlikte oluşacak kullanıcı etkileşiminin, sonuç olarak deneyimlerinin nasıl olacağını belirleyecek olan ve tasarım süreci içinde dikkate alınması gereken önemli noktalardır.&nbsp;</p><h2>Kullanıcı Deneyimi ve Tasarımının Önemi&nbsp;</h2><p>Kullanmakta olduğumuz ürün ve hizmetlerle karşılıklı olarak aramızda bir ilişki söz konusudur. Bir kullanıcı olarak gün içinde farklı ihtiyaçlarımıza yönelik olarak telefon, araba, çeşitli bilgisayar yazılımları, web sayfaları, mobil uygulamalar gibi arayüzler ve nesnelerle etkileşime girmekteyiz.&nbsp;</p><p>Her bir etkileşim sonucunda; bize sağlanan fayda, yaşatılan deneyim kalitesi, hissettirilenler ve izlenimlerimiz, ürün ya da hizmeti tercihimizde önemli bir rol oynamaktadır. Ürün ya da hizmetin tasarımının nitelikleri ve bu niteliklerin bizlerin deneyimlerini etkilemesine bağlı olarak aramızda bir bağ oluşur.</p><p>Kullanıcısının işlevsel boyuttaki problemlerini çözmesinin yanında duygusal düzeyde de iletişim kuran tasarımlar kullanıcıya anlamlı deneyimler yaşatarak ilgisini çekmekte, keyif vermekte ve memnuniyet sağlamaktadır. Karar alma süreçlerini etkileyen bu deneyimler insanın doğası gereği çevresel uyarıcılarla girdiği etkileşimlerle şekillenmektedir. Bu da sunulan hizmetler ve ürünlerin kullanıcı deneyimini dikkate alarak tasarlanmasının gereğini ortaya koymaktadır. Günümüzde genellikle web siteleri, bilgisayar ve mobil cihazların arayüzleri gibi elektronik ortamlar üzerinden sunulan hizmet ve ürünlere odaklanan çalışmalarda ön plana çıkıyor gözükse de kullanıcı deneyimi çalışmaları kavramsal olarak bir ürün ya da hizmetin kullanıcı ile bir arayüz vasıtasıyla ilişkilendiği tüm durumlar için geçerlidir.&nbsp;</p>', 'Kullanıcı deneyimi kavramı, kullanmakta olduğunuz ürün (teknoloji) veya hizmetler ile olan iletişim veya karşılıklı etkileşiminizle ilgili bir kavramdır. Kısaca, bu ürün ve hizmetleri kullanırken ve kullanmaya devam ederken nasıl hissettiğiniz, kullanıcı deneyimi tasarımının odak noktasıdır. Adından da anlaşılacağı üzere kullanıcı deneyimleri, ürün veya hizmete yönelik tasarım sürecinin ayrılmaz bir parçasıdır.', 'yazi_599638.jpg', 'Yazılım', 'yazilim', '2020-05-22 01:44:56', 'serkanyalcin', 30),
(12, 'Kullanıcı Deneyimi Kavramı', 'kullanici-deneyimi-kavrami', '<h2>Kullanıcı Deneyimi Kavramı Nedir?</h2><p>Kullanıcı deneyimi kavramı günümüzde yaygın bir şekilde birbirinden farklı birçok anlamı ifade eden durumlar için kullanılmaktadır. Ürün ya da hizmetin kullanıcı ile bir arayüz vasıtasıyla ilişkilendiği tüm durumlar için geçerli olan kullanıcı deneyimi; günümüzde daha çok web siteleri, bilgisayar ve mobil cihazların arayüzleri gibi elektronik ortamlar üzerinden sunulan hizmetler ve ürünler için kullanılmaktadır.</p><h2>Deneyim&nbsp;</h2><p>Kullanıcı davranışları açısından önemli unsur olan “deneyim”, günümüz değişen yaşam alışkanlıklarıyla sınırları belirli çizgilerle tanımlanamayan bir kavram hâline gelmiştir. Sözlükte “bir kimsenin belli bir sürede veya hayat boyu edindiği bilgilerin tamamı” olarak tanımlanan deneyim, sınırlı zaman dilimi içinde insanın üzerinde olumlu ya da olumsuz etki bırakan etmenlerin tamamından oluşmaktadır. İnsanın doğası gereği çevresi ile girdiği etkileşimler neticesinde çevresel uyarıcılara verdiği cevaplar ve onlardan aldığı tepkiler deneyimlerinin oluşmasını sağlamaktadır. Bu kapsamda yapılan çalışmalarla deneyimin şekillendirilebilir olduğu görülerek “deneyimin tasarlanması” olarak tanımlanan farkındalık ortaya çıkmıştır. Deneyimin üründen ve hizmetten daha fazlası ile ilişkili olması durumu, kullanıcıda yaşattığı hislere verilen önemi arttırmıştır. Böylece tasarımcılar deneyimin odağında yer alan duyguların insanların hareketlerini, beklentilerini ve gelecek değerlendirmelerini etkilediğinin farkına vararak deneyimin muhatabı olan insan üzerine farklı düşünceler geliştiren çalışmalara yönelmişlerdir.&nbsp;</p><h2>Deneyim Türleri&nbsp;</h2><p>Tasarım odaklı olarak deneyim, ürünün/hizmetin bir özelliği değildir; ürün ve kullanıcı arasındaki etkileşimin bir çıktısıdır. Bu sebeple kullanıcının etkileşiminin gerçekleştiği anındaki zamansal ve inançsal karakteristik özelliklerine bağlı olarak değişiklik gösterebilir. Ürünlerin/hizmetlerin işlevsel ve hazsal özellikleri ile kullanıcıların geçmiş deneyimleri, öz imajları, kişisel değerleri, eğilimleri, ruh hâlleri, inançları gibi farklı özellikleri farklı düzeylerde deneyimler yaşamalarına etki etmektedir. Kullanıcıda yaratılan dört farklı deneyim türünden söz etmek mümkündür. Bunlar; estetik, davranışsal, yansıtıcı ve duygusal deneyimler olarak ayrı başlıklar altında toplansa da bu deneyimlerin her biri birbiriyle ilişkilidir ve bu ilişkiler kullanıcı deneyimini oluşturmaktadır.&nbsp;<br>&nbsp;</p>', 'Kullanıcı deneyimi kavramı günümüzde yaygın bir şekilde birbirinden farklı birçok anlamı ifade eden durumlar için kullanılmaktadır.', 'yazi_753606.jpg', 'Yazılım', 'yazilim', '2020-05-20 00:00:00', 'serkanyalcin', 8),
(13, 'İşletme İlkeleri', 'isletme-ilkeleri', '<h2>İşletme İlkeleri ve Yöntemleri</h2><p>Kâr amacı gütmeyen örgütler; kamu kurum kuruluşları ve sivil toplum kuruluşlarıdır. Adından da anlaşılacağı üzere bu örgütlerin asıl amaçları kâr elde etmek değildir. Belirlemiş oldukları amacı gerçekleştirmek için faaliyette bulunurlar. Fakat bu durum örgütlerin gelir ve kâr elde etmeyeceği/ etmediği manasına gelmemektedir. Bu örgütler de faaliyetleri sonucu gelir/kâr elde etmektedir. Buradaki ince nokta kâr elde etmenin bir amaç değil; faaliyetlerin devamını sağlayabilmek için bir araç olmasıdır. Diğer bir örgüt türü ise kâr amacı güden örgütler yani işletmelerdir. Kamu kurum kuruluşlarından ve sivil toplum kuruluşlarından farkı; elde etmek istedikleri kârın bir araç değil amaç; yapılan faaliyetlerin ise kâr elde etmek için bir araç olmasıdır.</p><p>Örnek vermek gerekirse bir Sivil Toplum Kuruluşunun (STK) kurucusu da bir işletmenin kurucusu da etkinlik ve verimlilik ölçütlerini dikkate alarak faaliyette bulunur. Bu faaliyetlerde bulunmak için çeşitli maliyetlere katlanır ve bu faaliyetler sonucu gelir elde eder. Gelirler ile giderler arasındaki fark ise (en temel tanımıyla) kâr olarak kabul edilir. STK’nin kurucusu bu kârı faaliyetlerin devamı için harcarken işletme kurucusu elde edilen bu kârı kendi amaçları için harcayacaktır. Elde edilen kârın kullanım yeri dışında örgütün kurulması, yönetimi çalışma ilkeleri benzer özellikler taşımaktadır. </p>', 'Kâr amacı gütmeyen örgütler; kamu kurum kuruluşları ve sivil toplum kuruluşlarıdır. Adından da anlaşılacağı üzere bu örgütlerin asıl amaçları kâr elde etmek değildir', 'yazi_359147.jpg', 'Bilgi', 'bilgi', '2020-05-22 03:26:19', 'serkanyalcin', 62),
(14, 'İş Gücü Piyasası', 'is-gucu-piyasasi', '<h2>İş Gücü Piyasası</h2><p>İşletmelerin faaliyetlerini başarı ile sürdürebilmeleri için ihtiyaç duydukları kaynaklardan biri de iş gücüdür. İş gücü piyasası, insan kaynaklarına ihtiyaç duyan işletmeler ile çalışmak isteyen insanların buluştukları piyasa olarak tanımlanabilir. İş gücü piyasasında nitelikli iş gücünün varlığı, işletmelerin daha verimli faaliyet göstermesini ve yeni ürünler üretebilmesini sağlar. İş gücü piyasasında çalışanlar, mavi yaka ve beyaz yaka olmak üzere yaptıkları işin niteliklerine göre ikiye ayrılırlar. Mavi yaka çalışanlar, üretim hattında görev alan işçi ve ustaları tanımlarken beyaz yaka çalışanlar işletmenin finans, pazarlama vb. çeşitli fonksiyonlarında görev alan yöneticileri ve uzmanları ifade eder. Bir sektöre nitelikli iş gücünün kazandırılması uzun vadeli çabalarla mümkün olur. Eğitim kurumlarının, meslek liselerinin, belirli alanlarda uzmanlaşmış araştırma enstitülerinin varlığı gerekli bilgi ve becerilere sahip çalışanların yetiştirilmesi için çok önemlidir. Hızla değişen çevresel koşulların sonucu olarak becerilerin sürekli geliştirilmesi ve güncellenmesi ihtiyacı ise işletmelerde eğitim faaliyetlerini daha önemli hâle getirmektedir. </p>', 'İşletmelerin faaliyetlerini başarı ile sürdürebilmeleri için ihtiyaç duydukları kaynaklardan biri de iş gücüdür.', 'yazi_7985.jpg', 'Bilgi', 'bilgi', '2020-05-22 03:15:41', 'serkanyalcin', 109);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `yazi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `adi`, `yorum`, `email`, `tarih`, `yazi_id`) VALUES
(1, 'serkan yalçın', 'Çok yerinde bir işlem olmuş', 'serkan.syalcin@hotmail.com', '2020-05-18', 5),
(2, 'bora acar', 'Realmenin telefonları piyasayı karıştıracak gibi duruyor', 'boraacar95@gmail.com', '2020-05-18', 4),
(8, 'Ahmet Pınar', 'Netflix eski içeriklerindeki kalitesi artık yok. Hep aynı içerikler var', 'ahmet@gmail.com', '2020-05-18', 2),
(15, 'ercan taner', 'microsoft yeni modelleri pitasayı kavuracak gibi', 'ercan@gmail.com', '2020-05-19', 2),
(16, 'hasan mustan', 'ÖSYM güncel sınav tarihlerini materyalimçnet de bulabilirsiniz', 'hasan@gmail.com', '2020-05-19', 2),
(18, 'ercan', 'iphone 6 s en güzel model', 'taner@gmail.com', '2020-05-19', 11),
(20, 'Yusuf  Efe', 'Ağ Yapıları dersi epey zor bir ders', 'yusufefe@gmail.com', '2020-05-20', 10);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `haber_bulteni`
--
ALTER TABLE `haber_bulteni`
  ADD PRIMARY KEY (`bulten_id`);

--
-- Tablo için indeksler `hakkinda`
--
ALTER TABLE `hakkinda`
  ADD PRIMARY KEY (`hakkinda_id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`sayfa_id`);

--
-- Tablo için indeksler `sosyal_medya`
--
ALTER TABLE `sosyal_medya`
  ADD PRIMARY KEY (`sosyal_id`);

--
-- Tablo için indeksler `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`yazi_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `haber_bulteni`
--
ALTER TABLE `haber_bulteni`
  MODIFY `bulten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hakkinda`
--
ALTER TABLE `hakkinda`
  MODIFY `hakkinda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `sayfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `sosyal_medya`
--
ALTER TABLE `sosyal_medya`
  MODIFY `sosyal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
