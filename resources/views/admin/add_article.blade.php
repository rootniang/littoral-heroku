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
                    Nouveau Article
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
            <form action="{{ route("article.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Name/Description fields, irrelevant for this article --}}
                <label class="label">Catégorie</label>
                <div class="select">
                    <select name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->libellle }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre de l'article</label>
                    <input required type="text" name="titre" class="form-control" id="titre" placeholder="Titre de l'article" required>
                </div>

               <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea required type="text" name="description" class="form-control" id="description" placeholder="Description article" ></textarea>
                </div>

                <div class="form-group">
                    <label for="document">Documents</label>
                    <div class="needsclick dropzone ddz-clickable" id="document-dropzone">
                        <div class="dz-default dz-message">
                            <span>Drop files here to upload</span>
                        </div>
                    </div>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit">
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>

</x-app-layout>
<script>
    var uploadedDocumentMap = {}


    Dropzone.options.documentDropzone = {
      url: '{{ route('document.upload') }}',
      maxFilesize: 2, // MB
      addRemoveLinks: true,
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      success: function (file, response) {
        $('form').append('<input type="hidden" name="document[]" value="' + response.path + '">')
        uploadedDocumentMap[file.name] = response.name
      },
      removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name
        } else {
          name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="document[]"][value="' + name + '"]').remove()
      },
      init: function () {
        @if(isset($project) && $project->document)
          var files =
            {!! json_encode($project->document) !!}
          for (var i in files) {
            var file = files[i]
            this.options.addedfile.call(this, file)
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
          }
        @endif
      }
    }
  </script>

