
<x-front-layout>
    <div class="bloc-1-detail-article mb-5 d-flex flex-column justify-content-center align-items-center">
        <h1 class="mt-5">Alertes</h1>
    </div>
    <div class="container">
        <div class="row">
            @foreach($alertes as $alerte)
            <div class="col-lg-4 col-sm-12 article-2 mb-2">
                <img style="max-height: 10rem; height:10rem; width: 100%;" class="img-fluid rounded" src="img/art6.jpeg" alt="">
                <h3>{{ $alerte->publication->titre }}</h3>
                <p>
                    {{ substr($alerte->description, 0, 45)."..." }} 
                </p>
                <a class="btn btn-outline-primary rounded" href="{{ route("details-article", $alerte->id) }}">Voir Plus</a>
            </div>
            @endforeach
        </div>
    </div>
</x-front-layout>
