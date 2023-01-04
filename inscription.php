<?php require_once('./include.php');

if (!empty($_POST)) {
  extract($_POST);

  $valid = (bool) true;


  if (isset($_POST['inscription'])) {
    $username = trim($username);
    $password = trim($password);
    $nom = trim($nom);
    $prenom = trim($prenom);
    $email = trim($email);
    $telephone = trim($telephone);
    $adresse = trim($adresse);
    $motivation = trim($motivation);

    if (empty($username)) {
      $valid = false;
      $err_username = "Ce champ ne peut pas être vide";
    } elseif (grapheme_strlen($username) < 3) {
      $valid = false;
      $err_username = "Ce pseudo doit faire au moins 3 caractères";
    } elseif (grapheme_strlen($username) > 25) {
      $valid = false;
      $err_username = "Ce pseudo doit faire moins de 26 caractères(" . grapheme_strlen($username) . "/25";
    } else {
      $req = $DB->prepare("SELECT id 
          FROM utilisateurs
          WHERE username = ?");

      $req->execute(array($username));

      $req = $req->fetch();

      if (isset($req['id'])) {
        $valid = false;
        $err_username = "Ce pseudo est déjà pris";
      }
    }
    if (empty($email)) {
      $valid = false;
      $err_email = "Ce champ ne peut pas être vide";
    } else {
      $req = $DB->prepare("SELECT id 
          FROM utilisateurs 
          WHERE email = ?");

      $req->execute(array($email));

      $req = $req->fetch();

      if (isset($req['id'])) {
        $valid = false;
        $err_email = "Cette adresse mail est déjà prise";
      }
    }
    if (empty($password)) {
      $valid = false;
      $err_password = "Ce champ ne peut pas être vide";
    } // elseif($password<>$confpassword){
    //     $valid = false;
    //     $err_password = "Le mot de passe est different de la confirmation";
    // }


    if ($valid) {

      $crypt_password = password_hash($password, PASSWORD_ARGON2ID);

      if (password_verify($password, $crypt_password)) {
        echo 'Le mot de passe est valide';
      } else {
        echo "Le mot de passe n'est pas valide";
      }

      $date_creation = date('Y-m-d H:i:s');
      $heure_connexion = date('Y-m-d H:i:s');

      $req = $DB->prepare("INSERT INTO utilisateurs(username, mdp, nom, prenom, email,telephone, adresse, motivation, date_creation, heure_connexion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $req->execute(array($username, $crypt_password, $nom, $prenom, $email, $telephone, $adresse, $motivation, $date_creation, $heure_connexion));

      header('Location: ./connexion');
      exit;
    } else {
      echo "<div><p class='text-center'>Oups, quelque chose à mal fonctionner</p></div>";
      //pas d'insertion (affichage message d'erreur)
    }
  }
}

?>

<!doctype html>
<html lang="fr">

<head>
  <title>Harpie</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="./assets/logo_harpie.png" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/Main.css" />
  <script defer src="./Animation.js"></script>

</head>

<body>
  <?php include('./navBar.php') ?>
  <main>
    <h1 class="text-center text-decoration-underline mt-5">REJOINDRE HARPIE</h1>
    <form method="post" class="mx-auto d-flex flex-column col-md-3 my-5">
      <label for="username">Nom d'utilisateur:</label><br>
      <input type="text" id="username" name="username" value="<?php if (isset($username)) {
                                                                echo $username;
                                                              } ?>" required><br>
      <label for="password">Mot de passe:</label><br>
      <input type="password" id="password" name="password" <?php if (isset($password)) {
                                                              echo $password;
                                                            } ?> required><br>
      <label for="nom">Nom:</label><br>
      <input type="text" id="nom" name="nom" <?php if (isset($nom)) {
                                                echo $nom;
                                              } ?> required><br>
      <label for="prenom">Prénom:</label><br>
      <input type="text" id="prenom" name="prenom" <?php if (isset($prenom)) {
                                                      echo $prenom;
                                                    } ?> required><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" <?php if (isset($email)) {
                                                    echo $email;
                                                  } ?> required><br>
      <label for="telephone">Téléphone:</label><br>
      <input type="tel" id="telephone" name="telephone" <?php if (isset($telephone)) {
                                                          echo $telephone;
                                                        } ?> required><br>
      <label for="adresse">Adresse:</label><br>
      <textarea id="adresse" name="adresse" <?php if (isset($adresse)) {
                                              echo $adresse;
                                            } ?> required></textarea><br>
      <label for="motivation">Motivation:</label><br>
      <textarea id="motivation" name="motivation" <?php if (isset($motivation)) {
                                                    echo $motivation;
                                                  } ?> required></textarea><br>
      <input type="submit" value="Soumettre" class="mx-auto p-2" name="inscription">
    </form>
  </main>
  <?php include('./footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>