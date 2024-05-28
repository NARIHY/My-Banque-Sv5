import Chart from 'chart.js/auto';

/**
 * Classe représentant un objet CustomChart pour générer un graphique des créations par mois.
 * @class
 * @author RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 */
class CustomChart
{
    /**
     * Crée une instance de CustomChart.
     * @constructor
     * @param {string} apiUrl - L'URL de l'API à partir de laquelle récupérer les données.
     */
    constructor(apiUrl)
    {
        this.apiUrl = apiUrl;
    }

    /**
     * Récupère les données depuis l'API.
     * @async
     * @returns {Promise<Array>} Les données récupérées.
     */
    async fetchData()
    {
        try
        {
            const response = await fetch(this.apiUrl);
            const data = await response.json();

            if (!Array.isArray(data))
            {
                throw new Error('Les données récupérées ne sont pas sous forme de tableau.');
            }
            return data;
        } catch (error)
        {
            console.error('Erreur lors de la récupération des données:', error);
            throw error;
        }
    }

    /**
     * Compte le nombre de créations par mois pour une année donnée.
     * @async
     * @param {number} [year=new Date().getFullYear()] - L'année pour laquelle compter les créations.
     * @returns {Promise<Object>} Le nombre de créations par mois.
     */
    async compterParMois(year = new Date().getFullYear())
    {
        const data = await this.fetchData();
        const totalParMois = {};
        // Parcours des données pour compter les créations par mois
        data.forEach((item) => {
            const dateCreation = new Date(item.created_at);
            if (dateCreation.getFullYear() === year) {
            const month = dateCreation.getMonth();
            const count = totalParMois[month] || 0;
            totalParMois[month] = count + 1;
            }
        });
        return totalParMois;
    }

    /**
     * Génère un tableau de données pour le graphique à partir du nombre de créations par mois.
     * @param {Object} totalParMois - Le nombre de créations par mois.
     * @returns {Array} Le tableau de données pour le graphique.
     */
    genererDonneesPourChart(totalParMois) {
        const donnees = [];
        for (const month in totalParMois) {
            donnees.push(totalParMois[month]);
        }
        return donnees;
    }

    /**
     * Génère et affiche le graphique de la creation des compte par mois pendant une année
     * @async
     * @param {number} year - L'année pour laquelle générer le graphique.
     */
    async genererChart(annee)
    {
        try {
            const mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
            const totalParMois = await this.compterParMois(annee);
            const donneesPourChart = this.genererDonneesPourChart(totalParMois);
            const ctx = document.getElementById('lineChart').getContext('2d');
            // Vérifier si un graphique existe déjà sur le canvas
            if (Chart.getChart(ctx)) {
                // Si oui, détruire le graphique existant
                Chart.getChart(ctx).destroy();
            }
            // Créer un nouveau graphique
            new Chart(ctx, {
                type: 'line',
                data: {
                labels: mois,
                datasets: [{
                    label: 'Charte graphique pour l\'inscription des utilisateurs annuelle',
                    data: donneesPourChart,
                    fill: true,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.3
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

        } catch (error)
        {
          console.error('Une erreur est survenue:', error);
        }
    }

}


document.addEventListener("DOMContentLoaded", () => {
    // Instanciation de la classe CustomChart avec l'URL de l'API
    const chart = new CustomChart('http://localhost:8000/api/Globale/Utilisateur');

    // Sélection de l'élément du menu déroulant et du label pour l'année
    const yearSelect = document.getElementById('yearSelect');
    const yearLabel = document.getElementById('yearLabel');

    // Remplissage du menu déroulant avec les années de 2020 jusqu'à l'année actuelle
    const currentYear = new Date().getFullYear();
    const startYear = 2020; // Année de construction de l'application

    for (let year = startYear; year <= currentYear; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        yearSelect.appendChild(option);
    }

    /**
     * Gestionnaire d'événements pour le changement de sélection dans le menu déroulant.
     * @param {Event} event - L'événement de changement de sélection.
     */
    yearSelect.addEventListener('change', async (event) => {
        const selectedYear = parseInt(event.target.value);
        yearLabel.textContent = `Inscriptions durant l'année ${selectedYear}`;

        // Générer le graphique pour l'année sélectionnée
        try {
            await chart.genererChart(selectedYear);
        } catch (error) {
            // Afficher un message d'erreur si une exception est levée
            console.error('Une erreur est survenue lors de la génération du graphique:', error);
            // Afficher un message d'erreur à la place du graphique
            const lineChart = document.getElementById('lineChart');
            lineChart.innerHTML = '<p>Aucune compte n\'est inscrit pour cette année.</p>';
        }
    });
});






