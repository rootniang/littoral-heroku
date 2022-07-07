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
                    Nouveau Document
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
            <form action="{{ route('document.store') }}" enctype="multipart/form-data" method="post">
                @csrf
              
                <label class="label">Catégorie</label>
                <div class="select">
                    <select name="id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" name="{{ $category->id }}">{{ $category->libellle }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="label">Type</label>
                <div class="select">
                    <select name="type">
                        <option value="1" name="1">Image</option>
                        <option value="2" name="2">Video</option>
                        <option value="3" name="3">Docs</option>
                    </select>
                </div>
               <div class="mb-3">
                    <label for="title" class="form-label">Titre du Document</label>
                    <input required type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Document(s)</label>
                    <input required type="file"  name="file" class="form-control" >
                </div>
               
                <button type="submit" class="btn update_btn">Enregister</button>
            </form>
        </div>
    </div>
</x-app-layout>
