@extends('super-admin')

@section('title', 'Statisque globale')
@vite(['resources/css/chart.css', 'resources/js/CustomChart.js'])

@section('pagetitle')
    <div class="pagetitle">
        <h1>Gestion des comptes</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item">Gestion des comptes</li>
            <li class="breadcrumb-item active">Statistique globale</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
            @php
                $date = explode('-', now());
            @endphp
            <div class="card">
                <div class="card-body">
                <div class="card-title">
                    <div class="row mb-3 text-center">
                        <div class="col md-6">
                            <div id="selectContainer">
                                <label for="yearSelect">Choisir une date:</label>
                                <select id="yearSelect"></select>
                            </div>
                        </div>
                        <div class="col md-6">
                            <p id="yearLabel"></p>
                        </div>
                    </div>
                </div>


                <!-- Line Chart -->
                <canvas id="lineChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 886px;" width="1772" height="800"></canvas>

                <!-- End Line CHart -->

                </div>
          </div>

@endsection

