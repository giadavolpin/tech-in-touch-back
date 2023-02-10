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
    <div class="mt-3 ">
        <h1 class="mx-4">Crea un progetto</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{ route('admin.projects.store') }}" method="POST" class="p-4" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>*</strong>Nome</label>

                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required maxlength="15" minlength="3">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 15 </div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div>

                        <label for="cover_image" class="form-label">Inserisci un'immagine</label>
                        {{-- <input type="file" name="cover_image" id="create_cover_image"
                            class="form-control  @error('cover_image') is-invalid @enderror"> --}}
                        <div class=" mb-3 w-50">

                            <div class="img_preview position-relative mb-3">
                                <img class="d-block img-fluid" id="uploadPreview" src="https://via.placeholder.com/300x200">

                                <span id="my_reset_btn" class="position-absolute top-0 right-0">X</span>
                            </div>
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





                        <button type="submit" class="btn btn-dark">Invia</button>
                        <button type="reset" class="btn btn-light border-dark">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("uploadPreview");
            preview.src = src;
            preview.style.display = "block";
        } else {
            //da completare con il vecchio url del placeolder img

        }
    }

    // let preview = document.getElementById("uploadPreview");

    // let resetBtn = document.getElementById('my_reset_btn');

    // resetBtn.classList.add('prova')

    // resetBtn.addEventListener('click', function() {
    //     src = URL.createObjectURL('https://via.placeholder.com/300x200')
    //     preview.src = src;
    // })
</script>
