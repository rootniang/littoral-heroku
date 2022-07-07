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
                <h3 class="text_header title " >
                    Liste des documents 
                </h3>
            </div>
            <a href="{{ url('admin/document/create') }}" class="btn_ajout_item">
               Ajouter um Document
            </a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $document->publication->titre }}</td>
                    <td>{{ $document->publication->datePublication }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ url('admin/document/'.$document->id.'/edit') }}">
                                <button type="button" class="btn update_btn">Modifier</button></a>
                            <a href="#"> 
                                <form action="{{ url('admin/document/'.$document->id) }}" method="post" id="destroy-post-form">
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
