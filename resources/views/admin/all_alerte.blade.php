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
                <h3 class="text_header " >
                    LA LISTE DES ALERTES
                </h3>
            </div>
          
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alertes as $alerte)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $alerte->description }}</td>
                    <td>{{ $alerte->created_at }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            
                                <form action="{{ url('admin/alerte/'.$alerte->id) }}" method="post" id="destroy-post-form">
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
