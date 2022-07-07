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
                <h3 class="text_header title  ">
                    Liste des événements 
                </h3>
            </div>
            <a href="{{ url('admin/evenement/create') }}" class="btn_ajout_item">
               Ajouter Evenement
            </a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evenement</th>
                    <th scope="col">Date</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evenements as $evenement)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $evenement->publication->titre }}</td>
                    <td>{{ $evenement->date_evenement }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ url('admin/evenement/'.$evenement->id.'/edit') }}">
                                <button type="button" class="btn update_btn">Modifier</button></a>
                            <a href="#"> 
                                <form action="{{ url('admin/evenement/'.$evenement->id) }}" method="post" id="destroy-post-form">
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
