@extends('layouts.admin')



@section('content')
    {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div> --}}
    <div class="mt-3 dev_container ">
        <h1 class="text-center backoffice_title">
            <span class="text-black">Modifica</span>
            {{ $project->name }}
        </h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" class="p-4"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>

                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $project->name) }}" maxlength="50" minlength="3">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 15 </div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $project->description) }} </textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div>

                        <label for="cover_image" class="form-label">Inserisci un'immagine</label>
                        {{-- <input type="file" name="cover_image" id="create_cover_image"
                            class="form-control  @error('cover_image') is-invalid @enderror"> --}}
                        <div class=" mb-3 w-50">
                            {{-- @if ($project->cover_image)
                                <img class="d-block mb-2" id="cover_image" width="100"
                                    src="{{ asset('storage/' . $project->cover_image) }}">
                            @else
                                <img class="d-block mb-2" id="uploadPreview" width="200"
                                    src="https://via.placeholder.com/700x500">
                            @endif


                            <div>

                                <input type="file" name="cover_image" id="create_cover_image" class="form-control"
                                    value="{{ old('cover_image', $project->cover_image) }}"
                                    @error('cover_image') is-invalid @enderror>
                                @error('cover_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            @if ($project->cover_image)
                                <div class="position-relative ">
                                    <div class="img_preview mb-3 ">
                                        <img class="d-block img-fluid " id="uploadPreview"
                                            src="{{ asset('storage/' . $project->cover_image) }}">
                                    </div>
                                    <span id="my_reset_btn" class="d-none"><i class="fa-solid fa-circle-xmark"></i></span>
                                </div>
                            @else
                                <div class="position-relative ">
                                    <div class="img_preview mb-3 ">
                                        <img class="d-block img-fluid " id="uploadPreview"
                                            src="https://via.placeholder.com/300x200">
                                    </div>
                                    <span id="my_reset_btn" class="d-none"><i class="fa-solid fa-circle-xmark"></i></span>
                                </div>
                            @endif


                            <div>

                                <input type="file" name="cover_image" id="create_cover_image" accept="image/*"
                                    onchange="showPreview(event)"
                                    class="form-control  @error('cover_image') is-invalid @enderror">
                                @error('cover_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        {{-- <div class="mb-3 w-25">
                            <label for="category_id" class="form-label">Select Techonologies</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror" required>
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{--
                        <div class="mb-3">
                            <label for="tags" class="form-label">Seleziona le tecnologie usate</label> <br>
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">


                                    <input type="checkbox" class="form-check-input" id="{{ $technology->slug }}"
                                        name="technologies[]" value="{{ $technology->id }}">

                                    <label class="form-check-label"
                                        for="{{ $technology->slug }}">{{ $technology->name }}</label>
                                </div>
                            @endforeach
                            @error('technologies')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}





                        <button type="submit" class="btn dev_btn mt-3">Invia</button>
                </form>
            </div>
        </div>
    </div>
    {{-- <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script> --}}
@endsection
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            let input_field = document.getElementById('create_cover_image');
            let deleteBtn = document.getElementById('my_reset_btn');
            deleteBtn.classList.remove('d-none')
            let src = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("uploadPreview");
            preview.src = src;
            preview.style.display = "block";
            deleteBtn.addEventListener('click', () => {
                src = 'https://via.placeholder.com/300x200'
                preview.src = src
                input_field.value = ''
                deleteBtn.classList.add('d-none')
            })
        }
    }
</script>
