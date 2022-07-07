<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="container container_liste nice_nical_benito">
        <div class="header_liste d-flex">
            <div class="d-flex">
                <i class="bx bx-add-to-queue"></i>
                <h3 class="text_header  ">
                    Ajout d'un utilisateur
                </h3>
            </div>
        </div>
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Email</label>
                    <input   type="email" class="form-control" name="email" id="email" placeholder="ba.moussa6@ugb.edu.sn">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Prenom</label>
                            <input  type="text" class="form-control" name="prenom" id="nom" placeholder="Moussa ...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input  required type="text" class="form-control" name="nom" id="nom" placeholder="Ba ...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input  type="text" class="form-control" name="telephone" id="telephone" placeholder="7713983 ...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value="1" selected>utilisateur</option>
                                <option value="2">administratur</option>
                                <option value="3">super administrateur</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="datenaissance" class="form-label">date de naissance</label>
                            <input  type="date" class="form-control" name="datenaissance" id="datenaissance" placeholder=" ...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Organisation</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>choisir un poste</option>
                                @foreach ($organisations as $organisation )
                                <option value="{{ $organisation->id }}">{{ $organisation->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="poste" class="form-label">Poste</label>
                            <input  type="text" class="form-control" name="poste" id="poste" placeholder="directeur sde ...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input  required type="password" class="form-control" name="password" id="password" placeholder="4 caractere min ...">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="form-control btn update_btn">Enregister</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
