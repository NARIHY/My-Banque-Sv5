@php
  use Illuminate\Support\Facades\Auth;
  $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | Ma BANQUE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  @livewireStyles

  <!-- Vendor CSS Files -->
  <link href="{{asset('super-admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('super-admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('super-admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('super-admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('super-admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('super-admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('super-admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('super-admin/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="{{asset('super-admin/assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">NARIHY</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        {{-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav --> --}}

        {{-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('super-admin/assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('super-admin/assets/img/messages-2.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('super-admin/assets/img/messages-3.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav --> --}}

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (empty($user->picture))
              <img src="{{asset('users-default/default.png')}}" alt="Profile" class="rounded-circle">
            @else
              <img src="/storage/{{$user->picture}}" alt="Profile" class="rounded-circle">
            @endif

            <span class="d-none d-md-block dropdown-toggle ps-2">{{$user->username}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              @php
                $name = $user->name;
                $last_name = $user->last_name;
                if (empty($name)) {
                  $name = "Null";
                }
                if (empty($last_name)) {
                  $last_name = "Null";
                }
              @endphp
              <h6> {{$last_name}} {{$name}} </h6>
              <span>{{$user->role->title}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('Connecter.Administration.Profile.voir_compte')}}">
                <i class="bi bi-person"></i>
                <span>Mon profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('Connecter.Client.ProfilUtilisateur.voir_profil')}}">
                <i class="bi bi-gear"></i>
                <span>Paramètre</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> --}}
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <div class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-box-arrow-right"></i>
                      <input type="submit" value="Log out" style="background: transparent; border:transparent">
                    </div>

                </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Connecter.Administration.tableau_de_bord')}}">
          <i class="bi bi-grid"></i>
          <span>Tableau de bord</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-eye-fill"></i><span>Interface Visuelle</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Acceuil</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Propos</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Evenement</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav --> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Annonce</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('Connecter.Administration.Globale.Publicite.publiciter_liste')}}">
              <i class="bi bi-circle"></i><span>Publicités</span>
            </a>
          </li>
          {{-- <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Annonce</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Actualité</span>
            </a>
          </li> --}}
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-shop"></i><span>Catégorie de compte Bancaire</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @php
                $categorie_compte = App\Models\CompteBancaireCategorie::where('status', '!=', '1')
                                                                            ->get();
            @endphp
            @foreach ($categorie_compte as $categorie)
                <li>
                    <a href="{{route('Connecter.Administration.CompteBancaireCategorie.categorie_compte_personnalisable', ['id' => $categorie->id])}}">
                    <i class="bi bi-circle"></i><span>{{$categorie->nomCategorie}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
      </li>

      <!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-shop"></i><span>Banque</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{route('Connecter.Administration.CompteBancaire.liste_des_compte')}}">
                  <i class="bi bi-circle"></i><span>Liste des comptes</span>
                </a>
            </li>
            <li>
                <a href="{{route('Connecter.Administration.CompteBancaireCategorie.liste_categorie')}}">
                <i class="bi bi-circle"></i><span>liste des catégorie de compte</span>
                </a>
            </li>
            <li>
                <a href="{{route('Connecter.Administration.CompteBancaire.StatusCompte.liste_status_compte')}}">
                  <i class="bi bi-circle"></i><span>Status des comptes</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{route('Connecter.Administration.CompteBancaire.Statistique.index')}}">
                  <i class="bi bi-circle"></i><span>Statistique</span>
                </a>
            </li>
            <li>
              <a href="">
                <i class="bi bi-circle"></i><span>Acompte</span>
              </a>
            </li> --}}
            <li>
                <a href="{{route('Connecter.Administration.CompteBancaire.StatusCompte.corbeille')}}">
                    <i class="bi bi-circle"></i><span>Corbeille</span>
                </a>
            </li>
        </ul>
      </li><!-- End Icons Nav -->
      <!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#serviceClient" data-bs-toggle="collapse" href="#">
            <i class="bi bi-headset"></i><span>Serrvice Client</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="serviceClient" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{route('Connecter.Administration.ServiceClient.message_recu')}}">
                  <i class="bi bi-circle"></i><span>Contacte reçu</span>
                </a>
            </li>
            {{-- <li>
                <a href="">
                <i class="bi bi-circle"></i><span>liste des employer</span>
                </a>
            </li>
            <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>Message avec client</span>
                </a>
            </li>
            <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>Statistique</span>
                </a>
            </li> --}}
        </ul>
      </li><!-- End Icons Nav -->
      <!-- GestionCompte -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#GestionCompte" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Gestion des Compte</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="GestionCompte" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{route('Connecter.Administration.GestionDesCompte.liste_compte')}}">
                  <i class="bi bi-circle"></i><span>Liste</span>
                </a>
            </li>
            {{-- <li>
                <a href="">
                <i class="bi bi-circle"></i><span>liste des employer</span>
                </a>
            </li> --}}
            {{-- <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>Message avec client</span>
                </a>
            </li> --}}
            <li>
                <a href="{{route('Connecter.Administration.GestionDesCompte.statistique_globale')}}">
                  <i class="bi bi-circle"></i><span>Statistique</span>
                </a>
            </li>
            <li>
                <a href="{{route('Connecter.Administration.GestionDesRole.liste_role')}}">
                  <i class="bi bi-circle"></i><span>Liste des rôles</span>
                </a>
            </li>
        </ul>
      </li><!-- End GestionCompte -->



      <li class="nav-heading">Pages</li>

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Liste de tous nos employes</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
            <i class="bi bi-diagram-2-fill"></i>
          <span>Liste de nos employé</span>
        </a>
      </li><!-- End F.A.Q Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-envelope"></i>
          <span>Message reçu</span>
        </a>
      </li><!-- End Contact Page Nav --> --}}

      <!--

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
            <i class="bi bi-front"></i>
          <span>Narihy | Prof</span>
        </a>
      </li> --><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Connecter.Client.salutation')}}">
            <i class="bi bi-globe"></i>
          <span>Site</span>
        </a>
      </li><!-- End Register Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <!--
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    -->
    <!-- End Page Title -->
    @yield('pagetitle')

    <section class="section dashboard">
      @yield('content')
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NARIHY</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by <a href="">NARIHY</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @yield('javascript')
  <!-- Vendor JS Files -->
  <script src="{{asset('super-admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('super-admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('super-admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('super-admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('super-admin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('super-admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('super-admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('super-admin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('super-admin/assets/js/main.js')}}"></script>
<!-- livewire scrpits -->
@livewireScripts
</body>

</html>
