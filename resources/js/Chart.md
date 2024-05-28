J'ai une api rest qui a une url suivant
"http://localhost:8000/api/Globale/Utilisateur"

Dans cette url il y a des données sous Json, j'aimerai les recuperer en utilisant le fetch de javascript et les regrouper par ça date de création dans un tableau.


let mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

document.addEventListener("DOMContentLoaded", () => {
    new Chart(document.querySelector('#lineChart'), {
        type: 'line',
        data: {
        labels: mois,
        datasets: [{
            label: 'Line Chart',
            data: [65, 59, 80, 81, 56, 55, 40, 48, 56,20,11,54],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
        },
        options: {
            scales: {
                y: {
                beginAtZero: true
                },
                x: {
                    beginAtZero: true
                }
            }
        }
    });
});

maintenant voici une instance d'une chart fait, creer une méthode qui permet d'inclure le nombre totale de creation fait par une date bien precise, c'est à dire compter les par mois pour une année définie, l'année définie est par défaut l'année actuelle
ensuite créér une autre méthode qui permet de faire fonctionner ce chart

A droite de l'ecriture: Inscription durant l'année 2024 j'aimerai ajouter un select qui a pour valeur l'année de la construction de l'application, jusqu'à l'année actuelle

Maintenant, grace aux select qu'on vient de créer, j'aimerai que dans la méthode compterParMois là ou le parametre annee = new Date().getFullYear() c'est à dire L'année pour laquelle compter sont créer doivent être recuperer par le select. c'est à dire si l'année dans le select qu'on vient de créer est à 2020, le programme réafiche tous les compte qui sont inscrit par mois pendant cette anné selectionner, le principe est le meme.


Maintenant on récupere la valeur de se sélect <div id="selectContainer">
                        <label for="yearSelect">Inscriptions durant l'année</label>
                        <select id="yearSelect"></select>
                    </div> et l'affecter dans  chart.genererChart(2024);
