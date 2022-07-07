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
                    Modifier
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
            <form action="{{ url('admin/category/'.$categorie->id) }}" enctype="multipart/form-data" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la categorie</label>
                    <input  required type="text" class="form-control" name="name" id="name" value="{{ $categorie->libellle }}">
                </div>
                <button type="submit" class="btn update_btn">Enregister</button>
            </form>
        </div>
    </div>
</x-app-layout>
