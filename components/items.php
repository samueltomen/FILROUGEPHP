<?php
$db = new PDO('mysql:host=localhost;dbname=harpieong', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$sql = 'SELECT * FROM projets';
$requete = $db->query($sql);


while($news = $requete->fetch()) {

    echo '<div class="col-md-3 d-flex justify-content-center">' .
        '<div class="card mb-4">' .
        '<img class="card-img-top" src=' . $news['image'] . ' />' .
        '<div class="card-body">' .
        '<h5 class="card-title text-center">' . $news['titre'] . '</h5>' .
        '<p class="card-text text-center"><small class="text-muted">Publié le ' . $news['date'] . '</small></p>' .
        '<p class="card-text text-center">' . $news['text'] . '</p>' .
        '<p class="card-text text-center"><small class="text-muted"> Dernière mise à jour ' . $news['maj'] . '</small></p>' .
        '</div>' .
        '</div>' .
        '</div>.';
}

?>
<!-- <div class="col-md-4 d-flex justify-content-center">
    <div class="card mb-4">
        <?php echo '<img class="card-img-top" src=' . $news['image'] . ' />' ?>
        <div class="card-body">
            <?php echo '<h5 class="card-title text-center">' . $news['titre'] . '</h5>' ?>
            <p class="card-text text-center"><small class="text-muted">{article.date}</small></p>
            <p class="card-text text-center">{article.text}</p>
            <p class="card-text text-center"><small class="text-muted">{article.maj}</small></p>
        </div>
    </div>
</div> -->