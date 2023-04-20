<?php
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Gran Cacique Express | Gran Cacique II, C.A.</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout bg-light">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader">
               <img src="images/loading.gif" alt="#" />   
         </div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="header_top d_none1">
               <div class="container">
                  <div class="row">
                     <div class="col-md-4">
                        <ul class="conta_icon ">
                           <li><a href="#"><img src="images/call.png" alt="#"/>(+58) 0412-080-1540</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <ul class="social_icon">
                           <li> <a href="https://www.facebook.com/FerryGranCaciqueExpress"><i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                           </li>
                           <li> <a href="https://twitter.com/FerryGCexpress"><i class="fa fa-twitter"></i></a></li>
                           <!-- <li> <a href="https://www.tiktok.com/@grancaciqueexpress"> <i class="fa-brands fa-tiktok" aria-hidden="true"></i></a></li> -->
                           <li> <a href="https://www.instagram.com/ferrygrancacique/"><i class="fa fa-instagram" aria-hidden="true"></i>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <div class="se_fonr1">
                           <!-- <form action="#" >
                              <div class="select-box">
                                 <label for="select-box1" class="label select-box1"><span class="label-desc">English</span> </label>
                                 <select id="select-box1" class="select">
                                    <option value="Choice 1">English</option>
                                    <option value="Choice 1">Falkla</option>
                                    <option value="Choice 2">Germa</option>
                                    <option value="Choice 3">Neverl</option>
                                 </select>
                              </div>
                           </form> -->
                           <span class="time_o"> Horario de Atencion: 08:00am - 05:00pm</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-4">
                     <a class="logo" href="#"><img src="images/logo.png" alt="#"/></a>
                     </div>
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-4">
                        <ul class="right_icon d_none1">
                           <li><a href="#"><img src="images/shopping.png" alt="#"/></a> </li>
                           <a href="#" class="order">Compra boletos</a> 
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header_bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" id="menuCollapse">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navigationMenu">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active" id="homePage">
                                    <a class="nav-link" href="#" dataMenu="home" onClick="itemMenu(this)">Inicio</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#" dataMenu="oficinas" onClick="itemMenu(this)">Oficinas</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#" dataMenu="tarifas" onClick="itemMenu(this)">Tarifas</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#" dataMenu="calendario" onClick="itemMenu(this)">Calendario de Viajes</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#" dataMenu="requisitos" onClick="itemMenu(this)">Requisitos</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#" dataMenu="consultas" onClick="itemMenu(this)">Consultas de Boletos</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#" dataMenu="acerca" onClick="itemMenu(this)">Acerca de Nosotros</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header-->
      <div id="content"> 
            
      </div>
      <!--  footer -->
      <footer>
         <div class="footer">
            <!-- <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>INFORMATION </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>MY ACCOUNT </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>ABOUT  </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>CONTACTS  </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
               </div>
            </div> -->
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2023 Gran Cacique II, C.A. | J-30387605-6</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      
   </body>
   <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
      <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
</html>

