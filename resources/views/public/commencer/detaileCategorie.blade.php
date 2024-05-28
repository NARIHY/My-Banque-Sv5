@extends('client')

@section('titre', $categorie->nomCategorie)

@section('contenu')
<main id="main" >

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{route('Connecter.Client.NouveauMenbre.commencer')}}">Retour</a></li>
        </ol>
        <h2>{{$categorie->nomCategorie}}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
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
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
                <article class="entry">
                    <div class="entry-img">
                    <img src="/storage/{{$categorie->photo_couverture}}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                    <a href="#"> {{$categorie->nomCategorie}} </a>
                    </h2>

                    <div class="entry-meta">
                        @php
                            //date
                            $date_fr = new \Core\Date\DateFormaterFr($categorie->created_at);
                            //Compter les membres
                            $membre = \App\Models\CompteBancaire::where('compte_bancaire_categorie_id', $categorie->id)
                                                                    ->count();
                        @endphp
                    <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-shield-fill-check"></i> <a href="#">Ma banque</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01" style="color: rgb(48, 47, 47)">{{$date_fr->formatage_simple_fr()}}</time></li>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <b style="color: rgb(48, 47, 47)">{{$membre}}</b> </li>
                    </ul>
                    </div>

                    <div class="entry-content">
                    <p style="text-align: justify">
                        {{$categorie->description}}
                    </p>
                    <h2 class="entry-title">Pourquoi choisir {{$categorie->nomCategorie}}?</h2>
                    <p style="text-align: justify">
                        {{$categorie->nomCategorie}} est comme tous les autres types de catégorie de compte. Il n'y a pas beaucoup de différence
                        pour nos divers catégorie de compte sauf aux prix de l'abonnement mensuel, aux taux, à la sécurisation, à l'heure, la date de son actif et à diverse fonctionnalité de notre plateforme.
                        par exemple: <br>
                        <p style="text-align: justify">
                            {{$categorie->nomCategorie}} se différencie par son prix d'abonnement mensuel de <b>{{number_format($categorie->tarif, 0, 3, ',')}}Mga/Ans</b>.
                            Avec un taux annuel de <b>{{number_format($categorie->taux, 2,'.')}}%</b>, avec une disponibilité de
                            @php
                                // Important à améliorer
                                $origin = new DateTimeImmutable($categorie->heure_douverture);
                                $target = new DateTimeImmutable($categorie->heure_fermeture);
                                $interval = $origin->diff($target);
                            @endphp
                            @if($categorie->nomCategorie === "LAFATRA") <b> 24h/j</b> @else <b> {{$interval->format('%Hh')}}/j</b> @endif soit de <b>{{$categorie->heure_douverture}} - {{$categorie->heure_fermeture}}</b>  et du
                            @if ($categorie->jour_douverture === '5')
                                <b>Lundi jusqu'aux Vendredi</b>
                            @else
                                <b>Lundi jusqu'aux Dimanche</b>
                            @endif
                            .
                        </p>
                    </p>
                    <div class="read-more">
                        <a href="{{route('Connecter.Client.NouveauMenbre.abonement', ['nomCategorie' => $categorie->nomCategorie, 'id' => $categorie->id])}}">S'abonner</a>
                    </div>
                    </div>

                </article><!-- End blog entry -->


          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">
              <h3 class="sidebar-title">Recent Témoinage</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="{{asset('public/assets/img/blog/blog-recent-1.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{asset('public/assets/img/blog/blog-recent-2.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{asset('public/assets/img/blog/blog-recent-3.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{asset('public/assets/img/blog/blog-recent-4.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{asset('public/assets/img/blog/blog-recent-5.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Type de compte bancaire</h3>
              <div class="sidebar-item tags">
                @php
                    $categorie_compte = App\Models\CompteBancaireCategorie::where('status', '!=', '1')
                                                                                ->where('id', '!=', $categorie->id)
                                                                                ->get();
                @endphp
                <ul>
                    @foreach ($categorie_compte as $categ)

                        <li>
                            <a href="{{route('Connecter.Client.NouveauMenbre.detailler_linscription', ['nomCategorie' => $categ->nomCategorie, 'id' => $categ->id])}}">
                                {{$categ->nomCategorie}}
                            </a>
                        </li>
                    @endforeach
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection
