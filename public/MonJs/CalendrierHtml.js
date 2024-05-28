class CalendrierHtml {
    constructor(mois, annee) {
        this.mois = mois;
        this.annee = annee;
    }

    afficherCalendrier() {
        const premierJour = new Date(this.annee, this.mois - 1, 1);
        const dernierJour = new Date(this.annee, this.mois, 0);
        const premierJourSemaine = premierJour.getDay();
        const nombreJours = dernierJour.getDate();

        // Construction de la chaîne HTML pour le calendrier avec les classes Bootstrap
        let calendrierHTML = `
            <h2 class="text-center">${premierJour.toLocaleString('default', { month: 'long' })} ${this.annee}</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Lun</th>
                        <th class="text-center">Mar</th>
                        <th class="text-center">Mer</th>
                        <th class="text-center">Jeu</th>
                        <th class="text-center">Ven</th>
                        <th class="text-center">Sam</th>
                        <th class="text-center">Dim</th>
                    </tr>
                </thead>
                <tbody>
        `;

        // Boucle pour générer les jours du mois avec les classes Bootstrap
        let jourCourant = 1;
        for (let i = 0; i < 6; i++) {
            calendrierHTML += "<tr>";
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < premierJourSemaine) {
                    calendrierHTML += "<td></td>";
                } else if (jourCourant <= nombreJours) {
                    calendrierHTML += `<td class="text-center">${jourCourant}</td>`;
                    jourCourant++;
                }
            }
            calendrierHTML += "</tr>";
            if (jourCourant > nombreJours) break;
        }

        // Fermeture de la balise de tableau
        calendrierHTML += "</tbody></table>";

        // Retourner la chaîne HTML du calendrier
        return calendrierHTML;
    }

    afficherAnnee() {
        let calendrierAnneeHTML = "";
        for (let mois = 1; mois <= 12; mois++) {
            this.mois = mois;
            calendrierAnneeHTML += this.afficherCalendrier();
            calendrierAnneeHTML += "<hr>"; // Ajout d'une ligne de séparation entre les mois
        }
        // Retourner la chaîne HTML de tous les mois de l'année
        return calendrierAnneeHTML;
    }
}

// Utilisation de la classe pour générer le calendrier pour l'année en cours
const calendrier = new Calendrier(new Date().getMonth() + 1, new Date().getFullYear());
document.getElementById("calendrierContainer").innerHTML = calendrier.afficherAnnee();

