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
           
            @if($article)
            <form action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data" method="post">
                @method('put')
                @csrf
              
                <label for="idCat" class="form-label">Choisir une Catégorie</label>
                <div class="select">
                    <select name="idCat" id="idCat">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->libellle }}</option>
                        @endforeach
                    </select>
                </div>
              
               <div class="mb-3">
                    <label for="titre" class="form-label">Article</label>
                    <input required type="text" name="titre" class="form-control" id="titre" value="{{ $article->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"></label>
                    <textarea required name="description" class="form-control" id="description" >{{ $article->description }}</textarea>
                </div>
               
                <button type="submit" class="btn update_btn">Enregister</button>
                <button href="{{ route('article.index') }}" class="btn delete_btn">Annuler</button>
            </form>
            @else
                <div class="alert alert-danger">
                    <ul>
                        <li>Article introuvable</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
