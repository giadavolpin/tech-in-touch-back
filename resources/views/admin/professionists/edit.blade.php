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
        <h1 class="mx-4">Modifica Profilo</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{ route('admin.professionists.store') }}" method="POST" class="p-4"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nickname" class="form-label">Nickname</label>

                        <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname"
                            name="nickname" required maxlength="15" minlength="3"
                            value="{{ old('nickname', $professionist->nickname) }}">
                        @error('nickname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 15 </div>
                    </div>

                    <div class="mb-3">

                        <label for="name" class="form-label">Nome</label>

                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required maxlength="15" minlength="3"
                            value="{{ old('name', $professionist->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 15 </div>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Cognome</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"
                            name="surname" required maxlength="15" minlength="3"
                            value="{{ old('surname', $professionist->surname) }}">
                        @error('surname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 15 </div>
                    </div>

                    <div class="mb-3">
                        <label for="job_address" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control @error('job_address') is-invalid @enderror"
                            id="job_address" name="job_address"
                            value="{{ old('job_address', $professionist->job_address) }}">
                        @error('job_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        {{-- <div class="form-text">*Minimo 3 caratteri e massimo 15 </div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" name="bio">{{ old('bio', $professionist->bio) }}</textarea>
                    </div>

                    <div>

                        <label for="profile_image" class="form-label">Inserisci immagine</label>
                        {{-- <input type="file" name="profile_image" id="create_profile_image"
                            class="form-control  @error('profile_image') is-invalid @enderror"> --}}
                        <div class=" mb-3 w-50">

                            <img class="d-block mb-2" id="uploadPreview" width="100"
                                src="https://via.placeholder.com/300x200">
                            <div>

                                <input type="file" name="profile_image" id="create_profile_image"
                                    class="form-control  @error('profile_image') is-invalid @enderror">
                                @error('profile_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <label for="cv_path" class="form-label">Inserisci CV</label>
                        {{-- <input type="file" name="cv_path" id="create_cv_path"
                            class="form-control  @error('cv_path') is-invalid @enderror"> --}}
                        <div class=" mb-3 w-50">

                            <img class="d-block mb-2" id="uploadPreview" width="100"
                                src="https://via.placeholder.com/300x200">
                            <div>

                                <input type="file" name="cv_path" id="create_cv_path"
                                    class="form-control  @error('cv_path') is-invalid @enderror">
                                @error('cv_path')
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


                        <div class="mb-3">
                            {{-- <label for="tags" class="form-label">Select Tags</label> <br> --}}
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
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Numero di telefono</label>
                            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone_number" name="phone_number"
                                value="{{ old('phone_number', $professionist->phone_number) }}">
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- <div class="form-text">*Minimo 3 caratteri e massimo 15 </div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="linkedin" class="form-label">linkedin</label>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                                id="linkedin" name="linkedin" value="{{ old('linkedin', $professionist->linkedin) }}">
                            @error('linkedin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- <div class="form-text">*Minimo 3 caratteri e massimo 15 </div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="github" class="form-label">github</label>
                            <input type="text" class="form-control @error('github') is-invalid @enderror"
                                id="github" name="github" value="{{ old('github', $professionist->github) }}">
                            @error('github')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- <div class="form-text">*Minimo 3 caratteri e massimo 15 </div> --}}
                        </div>



                        <button type="submit" class="btn btn-dark">Invia</button>
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
