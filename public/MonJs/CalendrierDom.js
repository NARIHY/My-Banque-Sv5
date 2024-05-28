class CalendrierDom {
    constructor(mois, annee) {
        this.mois = mois;
        this.annee = annee;
    }

    afficherCalendrier() {
        const premierJour = new Date(this.annee, this.mois - 1, 1);
        const dernierJour = new Date(this.annee, this.mois, 0);
        const premierJourSemaine = premierJour.getDay();
        const nombreJours = dernierJour.getDate();

        // Affichage de l'en-tête du calendrier
        console.log(`${premierJour.toLocaleString('default', { month: 'long' })} ${this.annee}`);

        // Affichage des jours de la semaine
        console.log("Lun Mar Mer Jeu Ven Sam Dim");

        // Affichage des jours du mois
        let jourCourant = 1;
        for (let i = 0; i < 6; i++) {
            let ligne = '';
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < premierJourSemaine) {
                    ligne += '   ';
                } else if (jourCourant <= nombreJours) {
                    ligne += jourCourant.toString().padStart(3, ' ') + ' ';
                    jourCourant++;
                }
            }
            console.log(ligne);
            if (jourCourant > nombreJours) break;
        }
    }

    afficherAnnee() {
        console.log(`Année ${this.annee}`);
        for (let mois = 1; mois <= 12; mois++) {
            this.mois = mois;
            this.afficherCalendrier();
            console.log("---------------------------");
        }
    }
}
/*
// Utilisation de la classe pour afficher les mois de l'année en cours
const calendrier = new Calendrier(new Date().getMonth() + 1, new Date().getFullYear());
calendrier.afficherAnnee();
*/
