*************************************************************************************************************************************
* J'ai ces trois champ dans mon formulaire, je veux que si le premier champ 'ancien_code_secret' est remplis
* les deux dernier autre champ 'code_secret' et 'confirmation_code_secret'  devraient etre requis
*            'ancien_code_secret' => ['size:8'],
*            'code_secret' => ['required_with:ancien_code_secret', 'same:confirmation_code_secret','size:8']
* 
* Réponse à cette question:
* Pour réaliser cette logique dans votre formulaire, vous pouvez utiliser des règles de validation conditionnelles dans Laravel, si  c'est le framework que vous utilisez. Les règles que vous avez déjà semblent correctes pour votre cas d'utilisation. Voici comment vous pourriez les organiser dans votre contrôleur ou modèle :
* 
* $validatedData = $request->validate([
*    'ancien_code_secret' => ['size:8'],
*    'code_secret' => ['required_with:ancien_code_secret', 'same:confirmation_code_secret','size:8'],
*    'confirmation_code_secret' => ['required_with:ancien_code_secret', 'size:8']
* ]);
* 
* Cela signifie que :
* 
* Si 'ancien_code_secret' est rempli, alors 'code_secret' et 'confirmation_code_secret' doivent également être remplis et avoir une taille de 8 caractères.
* De plus, 'code_secret' doit être identique à 'confirmation_code_secret'.
* Assurez-vous également de bien mettre en place les messages d'erreur appropriés pour informer les utilisateurs des problèmes de validation.                                                                                                                         
*                                                                                                                                   *
*************************************************************************************************************************************
