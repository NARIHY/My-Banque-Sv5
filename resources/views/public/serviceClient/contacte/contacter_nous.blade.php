@extends('client')

@section('titre', 'Besoin de nous contactez')

@section('contenu')
        <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: rgba(6, 101, 183, 0.9);">
        <div class="container" data-aos="fade-up">

          <div class="section-title" style="margin-top: 80px">
            <h2>Besoin de nous contactez?</h2>
          </div>

          <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

            <div class="col-lg-5">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Localisation:</h4>
                  <p>BP 101, ANTANANARIVO, MADAGASCAR</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Notre addresse E-mail:</h4>
                  <p>maBanque.serviceClient@narihy.mg</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Notre numéro de téléphone:</h4>
                  <p>+261 00 00 000 00</p>
                </div>

              </div>

            </div>

            <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

              <form action="" method="post"  class="php-email-form">
                  @csrf
                    <!--
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                    -->
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="sujet_conversation" id="sujet_conversation" placeholder="Sujet de conversation" required>
                    </div>
                    <div class="form-group mt-3">
                    <textarea class="form-control" name="introduction_lettre" rows="5" placeholder="Introduction de la lettre" required></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="contenu_lettre" rows="5" placeholder="Contenu de la lettre" required></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="conclusion_lettre" rows="5" placeholder="conclusion_lettre" required></textarea>
                    </div>
                    @if (session('erreur'))
                        <div class="my-3">
                            <p style="color: red">
                                {{session('erreur')}}
                            </p>
                        </div>
                    @endif
                    @if (session('succes'))
                        <div class="my-3">
                            <p style="color: green">
                                {{session('succes')}}
                            </p>
                        </div>
                    @endif
                    <div class="text-center"><button type="submit">Envoyez</button></div>
              </form>

            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

@endsection
