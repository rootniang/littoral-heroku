
<x-front-layout>
    <div class="bloc-1-detail-article mb-5 d-flex flex-column justify-content-center align-items-center">
        <h1 class="mt-5">Articles</h1>
    </div>
    <div class="container">
        <div class="row">
            @php
                $count = 0;
            @endphp
            @foreach($articles as $article)
            <div class="col-lg-4 col-sm-12 article-2 mb-2">
                <img style="max-height: 10rem; height:10rem; width: 100%;" class="img-fluid rounded" src="img/art{{($count%6)+1}}.jpg" alt="">
                <h3>{{ $article->publication->titre }}</h3>
                <p>
                    {{ substr($article->description, 0, 45)."..." }} 
                </p>
                <a class="btn btn-outline-primary rounded" href="{{ route("details-article", $article->id) }}">Voir Plus</a>
            </div>
            @php
                $count++;
            @endphp
            @endforeach
        </div>
    </div>
</x-front-layout>
