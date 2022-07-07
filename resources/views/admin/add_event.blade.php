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
                    Nouveau Evénement
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
            <form action="{{ route('evenement.store') }}" enctype="multipart/form-data" method="post">
                @csrf
              
                <label class="label">Catégorie</label>
                <div class="select">
                    <select name="id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" name="{{ $category->id }}">{{ $category->libellle }}</option>
                        @endforeach
                    </select>
                </div>
              
               <div class="mb-3">
                    <label for="eventName" class="form-label">Evénement</label>
                    <input required type="text" name="eventName" class="form-control" id="eventName" placeholder="Event name">
                </div>
                <div class="mb-3">
                    <label for="eventDate" class="form-label">Date de l'evenement</label>
                    <input required type="date" min="<?php echo(date('Y-m-d', strtotime( Date('d-m-Y')) ))?>" name="eventDate" class="form-control" id="eventDate" placeholder="Event name">
                </div>
               
                <button type="submit" class="btn update_btn">Enregister</button>
            </form>
        </div>
    </div>
</x-app-layout>
