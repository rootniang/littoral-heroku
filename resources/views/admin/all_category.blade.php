<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="container container_liste nice_nical_benito">
    <div class="hide" id="add"></div>
    <div class="row ">
        <div class="header_liste d-flex">
            <div class="d-flex">
                <i class="bx bx-collection"></i>
                <h3 class="text_header title ">
                    Liste des Categories
                </h3>
            </div>
            <a href="{{ url('admin/category/create') }}" class="btn_ajout_item">
                Ajouter categorie
            </a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categorie)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $categorie->libellle }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ url('admin/category/'.$categorie->id.'/edit') }}">
                                <button type="button" class="btn update_btn">Modifier</button></a>
                            <a href="#"> 
                                <form action="{{ url('admin/category/'.$categorie->id) }}" method="post" id="destroy-post-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn delete_btn">Supprimer</button>
                                </form>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
