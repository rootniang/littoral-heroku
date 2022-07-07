<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' type="text/css" rel='stylesheet'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/script.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>

    </head>
    <body>
        <div class="sidebar close" style = "background-color : rgb(51 ,0, 102);">
            <div class="logo-details">
                <i class='bx bxl-c-plus-plus'></i>
                <span class="logo_name">Observatoire</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="#">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Tableau de bord</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Tableau de bord</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="{{ url('admin/category') }}">
                            <i class='bx bx-customize'></i>
                            <span class="link_name">Categories</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="{{ url('admin/category') }}">Categories</a></li>
                        <li><a href="{{ url('admin/category') }}">Toutes les Categories</a></li>
                        <li><a href="{{ url('admin/category/create') }}">Ajouter une Categorie</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="{{ url('admin/document') }}">
                            <i class='bx bx-file'></i>
                            <span class="link_name">Documents</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="{{ url('admin/document') }}">Tous les documents</a></li>
                        <li><a href="{{ url('admin/document/create') }}">Ajouter un Document</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-file-blank'></i>
                            <span class="link_name">Article</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Article</a></li>
                        <li><a href="{{ route('article.index') }}">Tous les articles</a></li>
                        <li><a href="{{ route('article.create') }}">Ajouter un article</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-calendar-event'></i>
                            <span class="link_name">Evenements</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="{{ url('admin/evenement') }}">Evenement</a></li>
                        <li><a class="link_name" href="{{ url('admin/evenement') }}">Tous les evenements</a></li>
                        <li><a class="link_name" href="{{ url('admin/evenement/create') }}">Ajouter un evenement</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="{{ route('users.index') }}">
                            <i class='bx bx-user'></i>
                            <span class="link_name">Administration</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Administration</a></li>
                        <li><a href="{{ route('users.index') }}">Tous les Admin</a></li>
                        <li><a href="{{ route('join.index') }}">Demande d'ahésion</a></li>
                        <li><a href="#">Ajouter un Admin</a></li>
                    </ul>

                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-bell'></i>
                            <span class="link_name">Alerte</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Alerte</a></li>
                        <li><a href="{{ route('alerte.index') }}">All alert</a></li>
                        
                    </ul>
                </li>
                <li>
                    @php
                    $nom = Auth::user()->nom;
                    $prenom = Auth::user()->prenom;
                    @endphp
                    <div class="profile-details">

                        <div class="profile-content">
                            <img src="https://avatars.dicebear.com/api/initials/{{$prenom." ".$nom}}.svg" alt="profileImg">
                        </div>
                        <div class="name-job">
                            <div class="profile_name">{{$prenom}}</div>
                            <div class="job">Administrateur</div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a :href="route('logout')" >
                                <button onclick="event.preventDefault();
                                this.closest('form').submit();" class="deconnexion"><i class='bx bx-log-out'></i></button>

                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
            <section class="home-section">
                <div class="home-content">
                    <i class='bx bx-menu'></i>
                </div>
                {{ $slot }}
            </section>
        </div>
    </body>
</html>
