<?php
echo '<button id="btn-top">Retour en haut</button>';
echo '<style>';
echo '#btn-top {';
echo '    position: fixed;';
echo '    bottom: 20px;';
echo '    right: 20px;';
echo '    background-color: #51ade5;';
echo '    color: #fff;';
echo '    font-family: "Bahnschrift";';
echo '    border: none;';
echo '    outline: none;';
echo '    cursor: pointer;';
echo '    padding: 10px;';
echo '    margin-right: 10px;';
echo '}';
echo '</style>';
echo '<script>';
echo 'document.getElementById("btn-top").addEventListener("click", function(){';
echo '    window.scrollTo(0, 0);';
echo '});';
echo '</script>';
?>
<nav class="navbar navbar-expand-md navbar-light bg-custom">
    <div class="container">
        <Link to="/"><a id="1" class="navbar-brand" href="index.php" onclick="activeLink()" aria-current="page"><img src='./images/logo_harpie.png' alt="logo harpie" width="55px" /></a></Link>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul id='navbarlink' class="navbar-nav ms-auto">
                <li class="nav-item">
                    <Link to="nosProjets"><a id="2" class="nav-link" href="./nosProjets.php" onclick="activeLink()">Nos projets</a></Link>
                </li>
                <li class="nav-item">
                    <a id="3" class="nav-link" onclick="activeLink()">Faites un don</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon profil</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="connexion.php">Se connecter</a>
                        <a class="dropdown-item" href="inscription.php">S'inscrire</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>