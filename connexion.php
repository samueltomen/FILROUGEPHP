<?php require_once('include.php');
// Connexion à la base de données


// Vérification des informations d'identification de l'utilisateur
if (!empty($_POST)) {
    extract($_POST);

    $valid = true;

    // Vérification du nom d'utilisateur
    if (empty($username)) {
        $valid = false;
        $err_username = "Veuillez entrer votre nom d'utilisateur";
    }

    // Vérification du mot de passe
    if (empty($password)) {
        $valid = false;
        $err_password = "Veuillez entrer votre mot de passe";
    }

    // Si les informations d'identification sont valides, recherche de l'utilisateur dans la base de données
    if ($valid) {
        $req = $DB->prepare("SELECT id, mdp FROM utilisateurs WHERE username = ?");
        $req->execute(array($username));
        $user = $req->fetch(); // Utilisation d'un autre nom de variable pour stocker le résultat de la requête SQL

        // Si l'utilisateur a été trouvé, vérification du mot de passe
        if ($user) {
            if (password_verify($password, $user['mdp'])) {
                // Si le mot de passe est correct, connexion de l'utilisateur
                session_start();
                $_SESSION['auth'] = $user;
                header('Location: dashboard.php');
                exit;
            } else {
                // Si le mot de passe est incorrect, affichage d'un message d'erreur
                $err_password = "Mot de passe incorrect";
            }
        } else {
            // Si l'utilisateur n'a pas été trouvé, affichage d'un message d'erreur
            $err_username = "Nom d'utilisateur incorrect";
        }
    }
}

?>



<!-- Formulaire de connexion -->
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
        <div class="d-flex mx-auto py-5 justify-content-around flex-wrap">
            <div class="w-50">
                <h1 class="p-2 text-center" >Merci ! Grace a toi plus de personnes vivront mieux leur quotidien</h1>
            </div>
            <form method="post" class="d-flex flex-column justify-content-center p-2 flex-wrap">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" name="username" id="username" value="<?php if (isset($username)) echo $username; ?>">
                <span class="error"><?php if (isset($err_username)) echo $err_username; ?></span>
                <br>
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password">
                <span class="error"><?php if (isset($err_password)) echo $err_password; ?></span>
                <br>
                <!-- Bouton de connexion -->
                <input type="submit" value="Connexion">
            </form>
        </div>

    </main>
    <?php include('./footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>