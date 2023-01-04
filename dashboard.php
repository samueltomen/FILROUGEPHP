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
    <script defer src="api.js"></script>

</head>

<body>
    <main>
        <?php include('navBar.php') ?>
        <h1 class="text-center my-5">Bienvenue sur votre Dashboard 🖐</h1>
        <br>
        <div class="informations d-flex justify-content-evenly">
            <div class="dons text-center">
                <h3 class="font-weight-italic text-decoration-underline">VOS DONS</h3>
                <div id="donations-widget">
                    <h4>Dons fait cette année</h4>
                    <p id="donation-count">0</p>
                </div>
            </div>
            <div class="vaccin text-center">
                <h3>VACCINS</h3>
            </div>
        </div>
        <!-- API -->

    </main>
    <?php include('./footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>