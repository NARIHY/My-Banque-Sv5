<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('titre') | Alliance prestige</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!--
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  -->

  <!-- Vendor CSS Files -->
  <link href="{{asset('public/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('monStyle/style.css')}}">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:AlliancePrestige@narihy.mg">AlliancePrestige@narihy.mg</a>
        <i class="bi bi-phone-fill phone-icon"></i> +261 00 00 000 00
      </div>
      @php
        $utilisateur = \Illuminate\Support\Facades\Auth::user();
        $verifier = \App\Models\CompteBancaire::where('users_id', $utilisateur->id)->count();
      @endphp
      @if ($verifier < 1)
        <div class="cta d-none d-md-block">
            <a href="{{route('Connecter.Client.NouveauMenbre.commencer')}}" class="scrollto">Commencer</a>
        </div>
      @endif
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{route('Connecter.Client.salutation')}}">Ma Banque</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto @if (request()->routeIS('Connecter.Client.salutation')) active @endif" href="{{route('Connecter.Client.salutation')}}">Acceuil</a></li>
          {{-- <li><a class="nav-link scrollto" href="">A propos</a></li> --}}
          <li><a class="nav-link scrollto @if (request()->routeIS('Connecter.Client.nos_service')) active @endif" href="{{route('Connecter.Client.nos_service')}}">Nos services</a></li>
          {{-- <li><a class="nav-link scrollto " href="">Portfolio</a></li> --}}
          {{-- <li><a class="nav-link scrollto" href="">Notre équipe</a></li> --}}
          {{-- <li><a class="nav-link scrollto" href="">Nos prix</a></li> --}}
          <li class="dropdown"><a href="#"><span>Mon compte</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route('Connecter.Client.ProfilUtilisateur.voir_profil')}}">Mon profile</a></li>
              <li class="dropdown"><a href="#"><span>Banque</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="{{route('Connecter.Client.EspacePersonnel.information_sur_mon_compte')}}">Information</a></li>
                  <li><a href="{{route('Connecter.Client.EspacePersonnel.statistique_compte_bancaire')}}">statistique</a></li>
                  <li><a href="{{route('Connecter.Client.EspacePersonnel.historique_sur_mon_compte')}}">Historique</a></li>
                  <li> <a href="{{route('Connecter.Client.EspacePersonnel.deposer_argent')}}">Déposer</a> </li>
                  <li>
                    <a href="{{route('Connecter.Client.EspacePersonnel.vue_pour_retirer_argent')}}">
                        Retrait
                    </a>
                  </li>
                  <li>
                    <a href="{{route('Connecter.Client.EspacePersonnel.vue_transfert')}}">
                        Transfert
                    </a>
                  </li>
                  {{-- <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li> --}}
                </ul>
              </li>
              @if ($utilisateur->role_id !== '1')
                <li><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Administration</a></li>
              @endif
              {{-- <li><a href="#">Drop Down 3</a></li> --}}
              <li>
                <form action="{{route('logout')}}" method="post">
                  @csrf
                  <input type="submit" style="background-color: transparent; border: 3px solid transparent" value="Se déconnecter">
                </form>

              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto @if (request()->routeIS('Connecter.Client.ServiceClient.NousContactez.nous_contactez')) active @endif" href="{{route('Connecter.Client.ServiceClient.NousContactez.nous_contactez')}}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('contenu')
  <!-- ======= Footer ======= -->
  <footer id="footer">

    {{-- <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Notre newsletter</h4>
            <p>
                Êtes vous à la recherche de nouveauté, inscrivez vous à notre newsletter. <b style="color: red"> Ne fonctionne pas pour le moment</b>
            </p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="S'inscrire">
            </form>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Lien utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('Connecter.Client.salutation')}}">Acceuil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">A propos de nous</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('Connecter.Client.nos_service')}}">Nos service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">C.G.U</a></li>
              {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> --}}
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos service</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Comptes d'épargne</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Prêts hypothécaires</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cartes de crédit</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services bancaires en ligne</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Gestion de patrimoine</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Assurance</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Besoin de nous contactez</h4>
            <p>
              Antananarivo <br>
              MADAGASCAR<br>
              AFRIQUE <br><br>
              <strong>Téléphone:</strong> +261 00 00 000 00<br>
              <strong>Couriel:</strong> AlliancePrestige@narihy.mg<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>A propos de nous</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>NARIHY</span></strong>. Tous droit réserver
      </div>
      <div class="credits">
        Template générer par <a href="">Bootstrap</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('public/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <!--
    pour le fonctionnement des formulaires
  <script src="{{asset('public/assets/vendor/php-email-form/validate.js')}}"></script>
  -->
  <!-- Template Main JS File -->
  <script src="{{asset('public/assets/js/main.js')}}"></script>
  <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
  @yield('script')
</body>

</html>

