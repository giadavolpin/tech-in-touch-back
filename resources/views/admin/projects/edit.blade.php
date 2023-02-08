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
        <h1 class="mx-4">Modifica {{ $project->name }} </h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" class="p-4"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>

                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $project->name) }}" required maxlength="15" minlength="3">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 15 </div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            value="{{ old('description', $project->description) }}" required minlength="15"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 15 caratteri</div>
                    </div>

                    <div>

                        <label for="cover_image" class="form-label">Inserisci un'immagine</label>
                        {{-- <input type="file" name="cover_image" id="create_cover_image"
                            class="form-control  @error('cover_image') is-invalid @enderror"> --}}
                        <div class=" mb-3 w-50">

                            <img class="d-block mb-2" id="uploadPreview" width="100"
                                src="https://via.placeholder.com/300x200">
                            <div>

                                <input type="file" name="cover_image" id="create_cover_image"
                                    class="form-control value="{{ old('cover_image', $project->cover_image) }}"
                                    @error('cover_image') is-invalid @enderror">
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





                        <button type="submit" class="btn btn-dark">Submit</button>
                        <button type="reset" class="btn btn-light border-dark">Reset</button>
                </form>
            </div>
        </div>
    </div>
    {{-- <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script> --}}
@endsection
