@extends('client')

@section('titre', 'Abonement a une compte bancaire')

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
        <div class="container" data-aos="fade-up">
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
            <div class="explication">
                <h2>Remarque:</h2>
                <p style="text-align: justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit saepe veniam animi obcaecati labore iste incidunt, dolore ullam nihil explicabo vitae quam, tempora consectetur fuga excepturi neque consequatur porro maxime aliquid dignissimos culpa dolorum. Fuga consequuntur, fugiat voluptatibus accusantium debitis placeat tempora perspiciatis illo aspernatur incidunt quia perferendis doloribus tenetur. Dolorem debitis nisi tempora accusamus quis quisquam est modi, laboriosam, perspiciatis repudiandae facere mollitia et repellendus animi consequatur veritatis, enim eum vero optio eaque deserunt fugit cum quas non. Amet esse veritatis rerum eveniet animi commodi eius illo in fugiat voluptatem similique aspernatur, ipsum nulla, officiis veniam inventore consequatur. Qui iusto praesentium vitae aut quasi repellendus, distinctio accusamus. Veniam nobis facere similique perspiciatis provident rem omnis. Illo iure dolores, unde aut dolorum delectus distinctio perspiciatis voluptates qui laudantium, aspernatur velit eius vero est quidem. Ex, distinctio iure saepe at consequuntur natus quas sequi velit praesentium, numquam incidunt consequatur! Rem, soluta porro suscipit ea, voluptatum voluptate, nulla eum dolores dignissimos totam aut! In culpa aut doloribus incidunt dolore similique excepturi, ut laudantium delectus nihil, unde amet porro veniam explicabo accusamus inventore veritatis commodi magni quidem. Ex dolore, aspernatur repellat quos beatae minus fugit vitae mollitia possimus placeat tenetur praesentium optio est distinctio, vero, consequatur nihil quibusdam. Animi nulla at voluptates provident fugit labore neque praesentium cum exercitationem nihil, sint distinctio, officia quisquam molestias voluptas dolorum ea odit consequatur totam corrupti ut! Quae dicta optio nobis voluptatibus minus excepturi deserunt blanditiis architecto maiores veritatis distinctio temporibus dolorem consequuntur deleniti, illum amet cupiditate quidem beatae sed repellat? Obcaecati quis voluptatem ducimus porro quae voluptas itaque minus enim minima quibusdam nulla quas dicta, ea autem mollitia nobis fugiat iste commodi officia maxime tempora voluptate necessitatibus. Fugiat harum ducimus ipsa iure dolor, incidunt itaque assumenda quasi eveniet placeat mollitia praesentium rerum, ex voluptate non recusandae officia repudiandae delectus accusamus veniam porro labore ullam. Ullam explicabo nobis corporis facilis consequuntur laudantium, sed saepe. Beatae earum quaerat quod consequatur aut, porro modi, officiis quam sit quae repudiandae? Exercitationem cupiditate fugiat minus odit asperiores rerum fugit dignissimos, tempore non doloribus et tenetur repudiandae, veritatis animi dolor a excepturi.
                </p>
            </div>
            <form action="{{route('Connecter.Client.NouveauMenbre.souscription', ['nomCategorie' => $categorie->nomCategorie, 'id' => $categorie->id])}}" method="post">
                @csrf
                @php
                    $cin = new \Core\Form\FormHtml();
                    if(old('cin') !== null) {
                        $cin->setValue(old('cin'));
                    }
                    $addresse = new \Core\Form\FormHtml();
                    if(old('addresse') !== null) {
                        $addresse->setValue(old('addresse'));
                    }
                    $password = new \Core\Form\FormHtml();
                    if(old('code_secret') !== null) {
                        $password->setValue(old('code_secret'));
                    }
                    $password_confirmation = new \Core\Form\FormHtml();
                    if(old('confirmation_code_secret') !== null) {
                        $password->setValue(old('code_secret'));
                    }
                    $bouton_submit = new \Core\Form\FormHtml();
                @endphp
                {{$cin->input('text', "Entrez votre numéro de Carte d\'identité Nationale ou CIN:", 'cin', '000 000 000 000')}}
                @error('cin')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                {{$addresse->input('text','Entrez votre addresse:', "addresse","Votre addresse")}}
                @error('addresse')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                <div class="row mb-3">
                    <div class="col md-6">
                        {{$password->password("Entrer votre code secret: (8chiffre)", "code_secret")}}
                        @error('code_secret')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                    <div class="col md-6">
                        {{$password_confirmation->password("Confirmer votre code secret: (8chiffre)", "confirmation_code_secret")}}
                        @error('confirmation_code_secret')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                </div>
                {{$bouton_submit->input_button("S'ouscrire", "btn btn-primary")}}

            </form>
        </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection
