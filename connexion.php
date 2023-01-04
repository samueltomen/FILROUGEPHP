<?php require_once ('include.php');
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
<?php include('./navBar.php') ?>
<form method="post">
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
<?php include('./footer.php') ?>