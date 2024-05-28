@extends('client')

@section('titre', 'Nos services')

@section('contenu')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services" style="background-color: rgba(6, 101, 183, 0.9);">
        <div class="container" data-aos="fade-up">

          <div class="section-title" style="margin-top: 100px">
            <h2 style="color: white">Nos services</h2>
            <p style="color: white">
              Alliance Prestige vous propose divers service qui sont:
            </p>
          </div>

          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <a href="#">
                    <div class="icon-box">
                        <i class="bi bi-bank"></i>
                        <h4><a href="#">Comptes d'épargne</a></h4>
                        <p>
                            Nos comptes d'épargne offrent aux clients un moyen sûr et pratique de mettre de l'argent de côté pour l'avenir, avec des taux d'intérêt compétitifs et la flexibilité nécessaire pour atteindre leurs objectifs d'épargne.
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
              <a href="#">
                    <div class="icon-box">
                        <i class="bi bi-currency-exchange"></i>
                    <h4><a href="#">Prêts hypothécaires</a></h4>
                    <p>
                        Grâce à nos prêts hypothécaires, les clients peuvent concrétiser leur rêve de propriété en bénéficiant de solutions de financement flexibles, d'un processus simplifié et de conseils personnalisés tout au long du parcours d'achat.
                    </p>
                    </div>
              </a>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
              <a href="#">
                <div class="icon-box">
                    <i class="bi bi-card-checklist"></i>
                  <h4><a href="#">Cartes de crédit </a></h4>
                  <p>
                    Nos cartes de crédit offrent aux clients la flexibilité financière dont ils ont besoin pour gérer leurs dépenses quotidiennes, avec des programmes de récompenses attractifs, une protection contre la fraude et une gestion en ligne facile.
                  </p>
                </div>
              </a>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
              <a href="#">
                <div class="icon-box">
                    <i class="bi bi-brightness-high"></i>
                    <h4><a href="#">Services bancaires en ligne</a></h4>
                    <p>
                      Nos services bancaires en ligne permettent aux clients de gérer leurs comptes 24 heures sur 24, 7 jours sur 7, en toute sécurité depuis n'importe quel appareil, avec des fonctionnalités telles que le paiement de factures, les transferts de fonds et le suivi des transactions.
                    </p>
                  </div>
              </a>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
              <a href="#">
                <div class="icon-box">
                    <i class="bi bi-calendar4-week"></i>
                    <h4><a href="#">Gestion de patrimoine </a></h4>
                    <p>
                      Notre équipe de professionnels en gestion de patrimoine offre des conseils personnalisés et des solutions de placement stratégiques pour aider nos clients à atteindre leurs objectifs financiers à long terme, tout en minimisant les risques et en maximisant les rendements.
                    </p>
                  </div>
              </a>
            </div>
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="600">
              <a href="#">
                <div class="icon-box">
                    <i class="bi bi-bar-chart"></i>
                  <h4><a href="#">Assurance</a></h4>
                  <p>
                    Nous proposons une gamme complète de produits d'assurance, y compris l'assurance-vie, l'assurance habitation et l'assurance automobile, pour offrir à nos clients une tranquillité d'esprit financière et une protection contre les imprévus de la vie.
                  </p>
                </div>
              </a>
            </div>
          </div>

        </div>
      </section><!-- End Services Section -->
@endsection
