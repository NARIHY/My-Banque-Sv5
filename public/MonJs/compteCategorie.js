//pour valider les champ cotés front-end
/*
    On vas récuperer tous les champ et les vérifier manuellements
    pour savoir si chaque champ a été bien remplie ou pas
    On ne peut pas
    Il y en as une erreur, rechercher sur le net comment gerer les formulaire front-end
*/
let nomCategorie = document.getElementById('nomCategorie');
let description =  document.getElementById('description');


//A verifier pour la validation , comment récuperer un champ de type fichier
let photo_de_couverture = document.getElementById('photo_de_couverture');
function validation() {
    const nomCategValue = nomCategorie.value;
    const descriptionValue = description.value;
    if(nomCategValue === "" && descriptionValue === "") {
        window.alert('Erreur, Tous les champ devrait être remplis. s\'il vous plait veuillez les remplir avant de les valider')
    }
}
