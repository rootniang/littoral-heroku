<x-app-layout>
    <div class="body_container  mt-0 d-flex">
        <div class="hide" id="add"></div>
        <div class="main_home_content nice_nical_benito h-100">
            {{-- <div class="colored_resume_xaliss nice_nical_benito">
                <h3 class="text_header">
                    Tableau de bord Observatoire Littoral
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos earum ea aliquid.</p>
            </div>  --}}
            <div class="quick_access w-100 d-flex mt-5">

                <div class="d-flex flex-wrap justify-content-center">
                    <a class="card1 d-flex flex-column justify-content-center align-items-center" href="{{ url('admin/category/create') }}">
                        <h3>Ajouter une categorie</h3>
                        <p class="small">Cliquez ici pour ajouter une nouvelle categorie.</p>
                        <div class="go-corner" href="{{ url('admin/category/create') }}">
                        <div class="go-arrow">
                            →
                        </div>
                        </div>
                    </a>
                    <a class="card1 d-flex flex-column justify-content-center align-items-center" href="{{route('article.create')}}">
                        <h3>Ajouter un article</h3>
                        <p class="small">Cliquez ici pour ajouter un nouvel article.</p>
                        <div class="go-corner" href="{{route('article.create')}}">
                            <div class="go-arrow">
                            →
                            </div>
                        </div>
                    </a>
                    <a class="card1 d-flex flex-column justify-content-center align-items-center" href= "{{ url('admin/evenement/create') }}">
                        <h3>Ajouter un evenement </h3>
                        <p class="small">Cliquez ici pour ajouter un nouvel evenement.</p>
                        <div class="go-corner" href="#">
                            <div class="go-arrow">
                            →
                            </div>
                        </div>
                    </a>
                    <a class="card1 d-flex flex-column justify-content-center align-items-center" href="{{ route('users.index') }}">
                        <h3>Gestion des admins</h3>
                        <p class="small">Cliquez ici pour gerer les administrateurs</p>
                        <div class="go-corner" href="{{ route('users.index') }}">
                            <div class="go-arrow">
                            →
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
