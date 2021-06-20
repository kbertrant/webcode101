<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>**************CECI EST UN TEST********************</h2>
    <h2>Bienvenue sur CODE 101</h2>
    <p>Vous etes inscrits sur code 101 en temps que :</p>
    
      <strong>Noms et prénoms </strong> : {{ $user->name }}<br>
      <strong>Adresse email </strong> : {{ $user->email }}<br>
      <strong>votre mot de passe généré </strong> : {{ $user->password }}<br>
    <p>Connectez vous et changez votre mot de passe.</p>
  </body>
</html>