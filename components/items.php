<div class="col-md-4 d-flex justify-content-center">
    <div class="card mb-4">
        <img class="card-img-top" src={`http://localhost:3000/img/${article.image}`} />
        <div class="card-body">
            <h5 class="card-title text-center">{ article.titre }</h5>
            <p class="card-text text-center"><small class="text-muted">{article.date}</small></p>
            <p class="card-text text-center">{article.text}</p>
            <p class="card-text text-center"><small class="text-muted">{article.maj}</small></p>
        </div>
    </div>
</div>