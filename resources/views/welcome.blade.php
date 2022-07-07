
<x-front-layout>
        <div class="slide">
            
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" >
                    <div class="carousel-item active">
                    <img src="img/slide2.jpg" class="d-block w-100 img-fluid rounded" style="max-height: 40rem; height:40rem; width: 100%;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="img/slide1.jpg" class="d-block w-100 img-fluid rounded" style="max-height: 40rem; height:40rem; width: 100%;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="img/slide.jpg" class="d-block w-100 img-fluid rounded" style="max-height: 40rem; height:40rem; width: 100%;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
        </div>

        <div class="container-fluid">
            <div class="row container-fluid bloc-2-accueil">
                <div class="col-lg-9 col-sm-12 row">
                    @foreach($bloc_2_articles as $article)
                    <div class="col-lg-6 col-sm-12 article-2">
                        <img style="max-height: 20rem; height:20rem; width: 100%;" class="img-fluid rounded" src="img/art6.jpeg" alt="">
                        <h3>{{ $article["publication"]->titre }}</h3>
                        <p>
                            {{ substr($article["article"]->description, 0, 65)."..." }} 
                        </p>
                        <a class="btn btn-outline-primary rounded" href="{{ route("details-article", $article["article"]->id) }}">Voir Plus</a>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-3 col-sm-12 d-flex flex-column justify-content-between">
                    @foreach($bloc_events as $event)
                    <div class="bloc-gauche row">
                        <div class="col-sm-4 border d-flex flex-column align-items-center justify-content-center">
                            <h4>{{ $event["jour"] }}</h4>
                            <h6 class="text-secondary">{{ $event["mois"] }}</h6>
                        </div>
                        <p class="text-justify col-sm-8">
                            {{ $event["publication"]->titre }} 
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="container-fluid">
                <div class="row  bloc-3-accueil">
                    <h2 style="color: #033386;margin-bottom: 10px;">Articles <a href="{{route('articles')}}" class="btn btn-outline-primary rounded">Voir Tout</a></h2>
                    @php
                        $count = 0;
                    @endphp
                    @foreach($bloc_4_articles as $article)
                    <div class="col-lg-3 col-sm-12 article-4">
                        <img style="max-height: 10rem; height:10rem; width: 100%;" class="img-fluid rounded" src="img/art{{($count%6)+1}}.jpg" alt="">
                        <h4>{{ $article["publication"]->titre }}</h4>
                        <p>
                            {{ substr($article["article"]->description, 0, 40)."..." }} 
                        </p>
                        <a href="{{ route("details-article", $article["article"]->id) }}">Voir Plus</a>
                    </div>
                    @php
                        $count++;
                    @endphp
                    @endforeach
                </div>
            </div> 
            
            <div class="container-fluid">
                <div class="row bloc-4-accueil">
                    <div class="col-sm-12 col-lg-6">
                        <h4>Alertes</h4>
                        <p class="text-justify">
                            Liste des alertes lancés par les acteurs du littoral. 
                        </p>
                        <a href="{{route('alertes')}}">Voir Plus</a>

                        <h4 class="mt-4">Les membres de l'observatoire</h4>
                        <p class="text-justify">
                            L'association des pêcheurs, ONG, associations, etc. 
                        </p>
                        <a href="#">Voir Plus</a>
                    </div>
                    <div class="col-sm-12 col-lg-6 rounded bloc-4-gauche">
                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.4413536468855!2d-17.474837185214334!3d14.687615378876147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec17347a7ddca45%3A0xe0ca3b156cde76d!2sCorniche%20Ouest!5e0!3m2!1sfr!2ssn!4v1656189860251!5m2!1sfr!2ssn" width="694" height="264" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>  
</x-front-layout>
