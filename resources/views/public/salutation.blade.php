@extends('client')

@section('titre', 'Bienvenue')

@section('contenu')
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Bienvenue chez <span>Alliance Prestige</span></h2>
          <p class="animate__animated animate__fadeInUp"> Là où l'excellence rencontre l'engagement envers nos clients </p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Voir +</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Votre Passage Vers l'Excellence Financière</h2>
          <p class="animate__animated animate__fadeInUp">
            Notre engagement envers l'excellence se reflète dans chaque aspect de nos services, de la diversité de nos produits financiers à la compétence de notre équipe professionnelle.
          </p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Voir +</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown"> Votre Portail Vers un Avenir Financier Brillant</h2>
          <p class="animate__animated animate__fadeInUp">
            En tant que partenaire financier de confiance, nous nous engageons à vous fournir les outils, les conseils et le soutien dont vous avez besoin pour réaliser vos rêves financiers.
          </p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Voir +</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">
        @if (session('erreur'))
            <p style="color: red">
                {{session('erreur')}}
            </p>
        @endif
        @if (session('succes'))
            <p style="color: green">
                {{session('succes')}}
            </p>
        @endif
    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Stabilité financière</a></h4>
              <p class="description">
                Une banque solide et respectée garantit la sécurité des fonds et des investissements, renforçant ainsi la confiance des clients et favorisant la croissance à long terme de l'institution.
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Large gamme de produits et services </a></h4>
              <p class="description">
                Une banque proposant une large gamme de services financiers répond efficacement aux besoins variés de sa clientèle, ce qui renforce sa compétitivité sur le marché.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Technologie et innovation </a></h4>
              <p class="description">
                Une gamme complète de produits et services financiers renforce la compétitivité d'une banque en répondant efficacement aux besoins diversifiés de sa clientèle.
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4 class="title"><a href="">Service clientèle de qualité </a></h4>
              <p class="description">

Un service client réactif et professionnel renforce la satisfaction et la fidélisation des clients en offrant une assistance personnalisée, des conseils financiers compétents et une résolution rapide des problèmes.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Icon Boxes Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Une petite historique sur nous</h2>
          <p>
            Il y a plusieurs décennies, dans une période de bouleversements économiques, un groupe de visionnaires du secteur financier se réunissait régulièrement pour discuter des défis et des opportunités qui se présentaient à eux. Ces individus partageaient une conviction profonde envers les principes de respect, de confiance et d'élégance dans le monde des affaires.
            Après des années de collaboration et de réflexion, ils décidèrent qu'il était temps de créer une institution financière qui incarnerait ces valeurs et qui offrirait un service exceptionnel à ses clients. Ils aspiraient à établir une alliance solide entre les clients et la banque, une alliance basée sur la confiance mutuelle et l'engagement envers l'excellence.
            Ainsi naquit "Alliance Prestige". Ce nom reflétait leur ambition de former des alliances durables avec leurs clients, tout en soulignant l'importance accordée au prestige et à l'élégance dans leurs opérations. Ils voulaient que chaque interaction avec leur banque soit empreinte d'un sentiment de distinction et de qualité supérieure.
            Depuis sa fondation, Alliance Prestige s'est engagée à fournir des services financiers de premier ordre, tout en maintenant les normes les plus élevées en matière d'intégrité et de transparence. Grâce à leur dévouement envers leurs clients et à leur approche innovante, Alliance Prestige est devenue une référence dans le secteur financier, reconnue pour son excellence et son engagement envers la satisfaction de ses clients.
          </p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              De notre part, nous avons:
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Solide réputation et confiance du public</li>
              <li><i class="ri-check-double-line"></i> Large gamme de produits et services financiers</li>
              <li><i class="ri-check-double-line"></i> Technologie et innovation </li>
              <li><i class="ri-check-double-line"></i> Réseau étendu de succursales et d'ATM </li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p style="text-align: justify">
                Notre banque se distingue par sa solide réputation et la confiance qu'elle inspire, résultant d'un engagement sans faille envers l'intégrité et la transparence. Dotée d'une large gamme de produits et services financiers adaptés aux besoins variés de ses clients, elle s'efforce continuellement d'innover grâce à des solutions technologiques avancées, garantissant une expérience bancaire moderne et sécurisée. En outre, son réseau étendu de succursales et d'ATM assure une accessibilité mondiale, offrant un service personnalisé et une assistance experte à sa clientèle, renforçant ainsi sa position de leader dans le secteur financier.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{asset('public/assets/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('public/assets/img/clients/client-2.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('public/assets/img/clients/client-3.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('public/assets/img/clients/client-4.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('public/assets/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('public/assets/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('public/assets/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('public/assets/img/clients/client-8.png')}}" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Why Us Section ======= -->
{{--
    <section id="why-us" class="why-us">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch position-relative video-box" style='background-image: url("assets/img/why-us.jpg");' data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">

            <div class="content">
              <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li data-aos="fade-up" data-aos-delay="100">
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300">
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

        </div>

      </div>
    </section>
     --}}
    <!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Nos services</h2>
          <p>
            Alliance Prestige vous propose divers service qui sont:
          </p>
        </div>

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
                <i class="bi bi-bank"></i>
              <h4><a href="#">Comptes d'épargne</a></h4>
              <p>
                Nos comptes d'épargne offrent aux clients un moyen sûr et pratique de mettre de l'argent de côté pour l'avenir, avec des taux d'intérêt compétitifs et la flexibilité nécessaire pour atteindre leurs objectifs d'épargne.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
                <i class="bi bi-currency-exchange"></i>
              <h4><a href="#">Prêts hypothécaires</a></h4>
              <p>
                Grâce à nos prêts hypothécaires, les clients peuvent concrétiser leur rêve de propriété en bénéficiant de solutions de financement flexibles, d'un processus simplifié et de conseils personnalisés tout au long du parcours d'achat.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
                <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Cartes de crédit </a></h4>
              <p>
                Nos cartes de crédit offrent aux clients la flexibilité financière dont ils ont besoin pour gérer leurs dépenses quotidiennes, avec des programmes de récompenses attractifs, une protection contre la fraude et une gestion en ligne facile.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="bi bi-brightness-high"></i>
              <h4><a href="#">Services bancaires en ligne</a></h4>
              <p>
                Nos services bancaires en ligne permettent aux clients de gérer leurs comptes 24 heures sur 24, 7 jours sur 7, en toute sécurité depuis n'importe quel appareil, avec des fonctionnalités telles que le paiement de factures, les transferts de fonds et le suivi des transactions.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-calendar4-week"></i>
              <h4><a href="#">Gestion de patrimoine </a></h4>
              <p>
                Notre équipe de professionnels en gestion de patrimoine offre des conseils personnalisés et des solutions de placement stratégiques pour aider nos clients à atteindre leurs objectifs financiers à long terme, tout en minimisant les risques et en maximisant les rendements.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
                <i class="bi bi-bar-chart"></i>
              <h4><a href="#">Assurance</a></h4>
              <p>
                Nous proposons une gamme complète de produits d'assurance, y compris l'assurance-vie, l'assurance habitation et l'assurance automobile, pour offrir à nos clients une tranquillité d'esprit financière et une protection contre les imprévus de la vie.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Rejoignez-nous dès aujourd'hui pour une expérience bancaire exceptionnelle !</h3>
            <p>
                Découvrez les nombreux avantages de notre banque et prenez le contrôle de vos finances dès maintenant. Ouvrez un compte en quelques minutes, accédez à nos services bancaires en ligne sécurisés et profitez d'un soutien personnalisé de notre équipe dévouée. Ne tardez pas, faites le premier pas vers un avenir financier plus prometteur avec nous !
            </p>
          </div>
          {{-- </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div> --}}

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfoio Section ======= -->
{{--
    <section id="portfolio" class="portfoio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Notre Portfolio</h2>
          <p>
            Voici notre portfolio de notre banque virtuelle ! Nous sommes fiers de vous présenter un aperçu de nos services innovants et de nos engagements envers nos clients :
          </p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{asset('public/assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="{{asset('public/assets/img/portfolio/portfolio-1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{asset('public/assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="{{asset('public/portfolio-2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{asset('public/assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="{{asset('public/assets/img/portfolio-3.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{asset('public/assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="{{asset('public/assets/img/portfolio/portfolio-4.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{asset('public/assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="{{asset('public/assets/img/portfolio/portfolio-5.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{asset('public/assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="{{asset('public/assets/img/portfolio/portfolio-6.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{asset('public/assets/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="{{asset('public/assets/img/portfolio/portfolio-7.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{asset('public/assets/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="{{asset('public/assets/img/portfolio/portfolio-8.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{asset('public/assets/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="{{asset('public/assets/img/portfolio/portfolio-9.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section>
     --}}
    <!-- End Portfoio Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Notre équipe</h2>
          <p>
            Bienvenue dans l'univers dynamique de notre équipe ! Chez Alliance, nous croyons fermement que le succès repose sur le talent, la collaboration et l'engagement envers l'excellence. Notre équipe est composée de professionnels passionnés, dévoués à fournir des services bancaires de première classe et à répondre aux besoins variés de nos clients.

Chaque membre de notre équipe apporte une expertise unique et une énergie positive, créant ainsi une culture d'innovation et de croissance. Que ce soit dans les domaines de la technologie, de la finance, du service clientèle ou de la conformité réglementaire, nous sommes unis par notre détermination à surpasser les attentes et à offrir une expérience exceptionnelle à nos clients.

Nous croyons en la force de la diversité et de l'inclusion, et nous encourageons un environnement où chacun peut apporter sa contribution et s'épanouir professionnellement. Notre équipe est notre plus grand atout, et c'est grâce à son talent et à son dévouement que nous continuons à évoluer et à exceller dans un monde en constante évolution.


          </p>
        </div>

        <div class="row">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('public/assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('public/assets/img/team/team-2.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="300">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('public/assets/img/team/team-3.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="400">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('public/assets/img/team/team-4.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    @php
        //categorie 1
        $money_format = new \Core\Chiffre\BaseChiffre($categ1->tarif, 3);
        //Date de création
        $date_creation = new \Core\Date\DateFormaterFr($categ1->created_at);
        //Date de mis à jour
        $date_maj = new \Core\Date\DateFormaterFr($categ1->updated_at);
        //categorie 2
        $money_format2 = new \Core\Chiffre\BaseChiffre($categ2->tarif, 3);
        //Date de création
        $date_creation2 = new \Core\Date\DateFormaterFr($categ2->created_at);
        //Date de mis à jour
        $date_maj2 = new \Core\Date\DateFormaterFr($categ2->updated_at);
        //categorie 3
        $money_format3 = new \Core\Chiffre\BaseChiffre($categ3->tarif, 3);
        //Date de création
        $date_creation3 = new \Core\Date\DateFormaterFr($categ3->created_at);
        //Date de mis à jour
        $date_maj3 = new \Core\Date\DateFormaterFr($categ3->updated_at);
        //categorie 4
        $money_format4 = new \Core\Chiffre\BaseChiffre($categ4->tarif, 3);
        //Date de création
        $date_creation4 = new \Core\Date\DateFormaterFr($categ4->created_at);
        //Date de mis à jour
        $date_maj4 = new \Core\Date\DateFormaterFr($categ4->updated_at);
    @endphp

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Nos service</h2>
          <p>
                Afin d'avoir une meilleurs qualité et performance envers nos client, nous vous proposons nos quelques service ci-dessous.
          </p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>
                    {{strtoupper($categ1->nomCategorie)}}
              </h3>
              <h4><sup>MGA</sup>{{$money_format->formatage_argent()}}<span> / ans</span></h4>
              <ul>
                <li>Avec un taux de: {{number_format($categ1->taux, 2,'.')}}%</li>
                <li>Jour d'ouverture: {{$categ1->jour_douverture}}j</li>
                <li>Horaire: {{$categ1->heure_douverture}} - {{$categ1->heure_fermeture}} </li>
                <li>Créer le: {{$date_creation->formatage_simple_fr()}}</li>
                <li>Mis à jour le: {{$date_maj->formatage_simple_fr()}}</li>
              </ul>
              <div class="btn-wrap">
                <a href="{{route('Connecter.Client.NouveauMenbre.commencer')}}" class="btn-buy">Plus d'information</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>{{$categ2->nomCategorie}}</h3>
              <h4><sup>MGA</sup>{{$money_format2->formatage_argent()}}<span> / ans</span></h4>
              <ul>
                <li>Avec un taux de: {{number_format($categ2->taux, 2,'.')}}%</li>
                <li>Jour d'ouverture: {{$categ2->jour_douverture}}j</li>
                <li>Horaire: {{$categ2->heure_douverture}} - {{$categ2->heure_fermeture}} </li>
                <li>Créer le: {{$date_creation2->formatage_simple_fr()}}</li>
                <li>Mis à jour le: {{$date_maj2->formatage_simple_fr()}}</li>
              </ul>
              <div class="btn-wrap">
                <a href="{{route('Connecter.Client.NouveauMenbre.commencer')}}" class="btn-buy">Plus d'information</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>{{$categ3->nomCategorie}}</h3>
              <h4><sup>MGA</sup>{{$money_format3->formatage_argent()}}<span> / ans</span></h4>
              <ul>
                <li>Avec un taux de: {{number_format($categ3->taux, 2,'.')}}%</li>
                <li>Jour d'ouverture: {{$categ3->jour_douverture}}j</li>
                <li>Horaire: {{$categ3->heure_douverture}} - {{$categ3->heure_fermeture}} </li>
                <li>Créer le: {{$date_creation3->formatage_simple_fr()}}</li>
                <li>Mis à jour le: {{$date_maj3->formatage_simple_fr()}}</li>
              </ul>
              <div class="btn-wrap">
                <a href="{{route('Connecter.Client.NouveauMenbre.commencer')}}" class="btn-buy">Plus d'information</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <span class="advanced">LEGENDE</span>
              <h3>{{$categ4->nomCategorie}}</h3>
              <h4><sup>MGA</sup>{{$money_format4->formatage_argent()}}<span> / ans</span></h4>
              <ul>
                <li>Avec un taux de: {{number_format($categ4->taux, 2,'.')}}%</li>
                <li>Jour d'ouverture: {{$categ4->jour_douverture}}j</li>
                <li>Horaire: {{$categ4->heure_douverture}} - {{$categ4->heure_fermeture}} </li>
                <li>Créer le: {{$date_creation4->formatage_simple_fr()}}</li>
                <li>Mis à jour le: {{$date_maj4->formatage_simple_fr()}}</li>
              </ul>
              <div class="btn-wrap">
                <a href="{{route('Connecter.Client.NouveauMenbre.commencer')}}" class="btn-buy">Plus d'information</a>
              </div>
            </div>
          </div>

        </div>
            <div class="text-center" style="margin-top: 15px">
                <a href="{{route('Connecter.Client.nos_service')}}">Voir plus</a>
            </div>
      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Question fréquement poser:</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Comment puis-je ouvrir un compte bancaire ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                    Pour ouvrir un compte bancaire, vous devez vous rendre dans l'une de nos succursales avec une pièce d'identité valide, une preuve d'adresse et un dépôt initial. Un représentant de la banque vous guidera tout au long du processus d'ouverture de compte et vous fournira les informations nécessaires sur les différents types de comptes disponibles.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Quels sont les frais associés à ce compte ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>

                    Les frais associés à chaque compte varient en fonction du type de compte que vous choisissez. Cependant, les frais courants peuvent inclure des frais de tenue de compte mensuels, des frais de transaction, des frais de découvert, etc. Un conseiller bancaire sera en mesure de vous fournir une liste complète des frais associés au compte de votre choix.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Comment puis-je accéder à mes comptes en ligne ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Pour accéder à vos comptes en ligne, vous devez vous inscrire à notre service de banque en ligne. Une fois inscrit, vous pourrez vous connecter à votre compte à tout moment depuis notre site web ou notre application mobile en utilisant vos identifiants personnels. Vous pourrez ainsi consulter vos soldes, effectuer des virements, payer des factures et bien plus encore.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Comment puis-je demander un prêt ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Pour demander un prêt, vous pouvez prendre rendez-vous avec l'un de nos conseillers en prêt dans une succursale près de chez vous. Ils vous guideront à travers le processus de demande, vous demanderont des informations sur votre situation financière et vous aideront à choisir le type de prêt qui vous convient le mieux. Une fois votre demande soumise, elle sera examinée et vous serez informé de la décision.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Quelles sont les options d'épargne disponibles pour les enfants ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Nous proposons plusieurs options d'épargne pour les enfants, telles que les comptes d'épargne pour enfants ou les comptes d'épargne-études. Ces comptes sont conçus pour aider les parents à épargner en vue des futurs besoins financiers de leurs enfants, comme les études universitaires ou l'achat d'une première voiture. Nos conseillers sont là pour vous aider à choisir le meilleur produit en fonction de vos objectifs d'épargne.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->
  </main><!-- End #main -->

@endsection
