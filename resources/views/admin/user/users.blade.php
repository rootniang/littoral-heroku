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
                <h3 class="text_header  ">
                    Liste des utisateur
                </h3>
            </div>
            <a href="{{ route('users.create') }}" class="btn_ajout_item">
                Nouveau utilisateur
            </a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">activé</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->numero_telephone }}</td>
                    @if ($user->actifYN == 1)
                        <td><a href="{{ route('user.unactived',$user) }}"><i class='fa fa-lock' style='color:#889ea5'></i></a></td>
                    @else
                        <td><a href="{{ route('user.actived',$user) }}"><i class='fa fa-unlock' style='color:#889ea5'></i></a></td>
                    @endif
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('users.edit',$user) }}">
                                <button type="button" class="btn update_btn">Modifier</button></a>
                            <a href="#">
                                <form action="{{ route('users.destroy',$user) }}" method="post" id="destroy-post-form">
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
