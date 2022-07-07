
<x-front-layout>
    <div class="bloc-1-detail-article mb-5 d-flex flex-column justify-content-center align-items-center">
        <h1 class="mt-5">{{ $publication->titre }}</h1>
        <p>{{ $nomCategorie }} | <i class="bi bi-calendar"></i> {{ $publication->datePublication }} | <i class="bi bi-pen"></i> {{ $nomAuteur }}</p>
    </div>
    <div class="container">
        <div class="mb-5">
            <img style="max-height: 20rem;" class="img-fluid rounded w-100" src="/img/art3.jpg" alt="imageArticle">
        </div>
        <div class="mb-5">
            <p class="lead">
                {{ $article->description}}
            </p>
        </div>
        <div class="row bloc-documents mt-3 mb-3">
            @foreach ($docs as $doc)
            <div class="col-sm-12 col-lg-2 pt-1 m-2 doc border border-primary position-relative">
                <div class="d-flex justify-content-between">

                    <img class="img-fluid w-50" src="/img/{{$doc->type}}.png" alt="">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" download href="#">Télécharger</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-center" style="width:90%;overflow:hidden">
                    {{substr($doc->chemin, 7)}}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</x-front-layout>
