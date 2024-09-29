<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>AUxiliaire.</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('welcome/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('welcome/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('welcome/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('welcome/images/favi.jpg')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('welcome/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('welcome/images/loading.gif')}}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="#"><img src="{{asset('welcome/images/A1.png')}}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
								<a href="{{ route('account.login') }}" class="nav-link">{{ __('se connecter') }}</a>
                              </li>
                              <li class="nav-item">
								<a href="{{ route('admin.login') }}" class="nav-link">{{ __('Vous Etes Admin ?') }}</a> 
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="text-bg">
                     <div class="padding_lert">
                        <i><img src="{{asset('welcome/images/btn.png')}}" alt="#"/></i>
                        <h1>Une Innovation Pour Faciliter  <br>La Gestion Des Auxiliaires D'autorité...</h1>
                        <a href="{{ route('pdf.generate') }}" class="btn btn-primary mt-4">Lire Encore..</a>

                     </div>
                  </div>
               </div>
               <div class="col-md-5 bah">
                  <div class="bann_img">
                     <figure><img src="{{asset('welcome/images/bann.png')}}" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- service -->
     
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="multipurpose">
                        <h3>Let’s  <br>Talk <br> Auxiliaire</h3>
                     </div>
                  </div>
                  <div class="col-md-7 sm_none">
                     <div class="contac_detel">
                        <ul>
                           <li><img src="{{asset('welcome/images/call.png')}}" alt="#"/>+ 212   606--424---424</li>
                           <li> <img src="{{asset('welcome/images/gmail.png')}}" alt="#"/>taroudannt@gmail.com</li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="multipurpose">
                        <p>Contacter les responsables. </p>
                     </div>
                  </div>
                  <div class="col-md-7 sm_show">
                     <div class="contac_detel">
                        <ul>
                           <li><img src="{{asset('welcome/images/call.png')}}" alt="#"/>+ 212   768--559---096</li>
                           <li> <img src="{{asset('welcome/images/gmail.png')}}" alt="#"/>taroudannt@gmail.com</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Copyright 2024 All Right Reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{asset('welcome/js/jquery.min.js')}}"></script>
      <script src="{{asset('welcome/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('welcome/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('welcome/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('welcome/js/custom.js')}}"></script>
   </body>
</html>
