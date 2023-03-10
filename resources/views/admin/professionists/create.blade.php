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
    <div class="mt-5 dev_container">
        <h1 class="mx-4 backoffice_title">Creazione Profilo Professionista</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{ route('admin.professionists.store') }}" method="POST" class="p-4"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nickname" class="form-label"><strong>*</strong>Nickname</label>

                        <input type="text" value="{{ old('nickname') }}"
                            class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname"
                            required maxlength="15" minlength="3">
                        @error('nickname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 15 </div>
                    </div>

                    <div class="mb-3">

                        <label for="name" class="form-label"><strong>*</strong>Nome</label>

                        <input value="{{ old('name') }}" type="text"
                            class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
                            maxlength="15" minlength="3">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 50 </div>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label"><strong>*</strong>Cognome</label>
                        <input type="text" value="{{ old('surname') }}"
                            class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname"
                            required maxlength="15" minlength="3">
                        @error('surname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">*Minimo 3 caratteri e massimo 50 </div>
                    </div>

                    <div class="mb-3">
                        <label for="job_address" class="form-label">Indirizzo</label>
                        <input type="text" value="{{ old('job_address') }}"
                            class="form-control @error('job_address') is-invalid @enderror" id="job_address"
                            name="job_address">
                        @error('job_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        {{-- <div class="form-text">*Minimo 3 caratteri e massimo 15 </div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Telefono</label>
                        <input type="tel" value="{{ old('phone_number') }}"
                            class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                            name="phone_number">
                        @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        {{-- <div class="form-text">*Minimo 3 caratteri e massimo 15 </div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" name="bio">{{ old('bio') }}</textarea>
                    </div>

                    <div>

                        <label for="profile_image" class="form-label">Inserisci un Immagine</label>
                        {{-- <input type="file" name="profile_image" id="create_profile_image"
                            class="form-control  @error('profile_image') is-invalid @enderror"> --}}
                        <div class=" mb-3 w-50">

                            <div class="position-relative ">
                                <div class="img_preview mb-3 ">
                                    <img class="d-block img-fluid " id="uploadPreview"
                                        src="https://via.placeholder.com/300x200">
                                </div>
                                <span id="my_reset_btn" class="d-none"><i class="fa-solid fa-circle-xmark"></i></span>
                            </div>

                            <div>

                                <input type="file" name="profile_image" id="create_profile_image" accept="image/*"
                                    onchange="showPreview(event)"
                                    class="form-control  @error('profile_image') is-invalid @enderror">
                                @error('profile_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <label for="cv_path" class="form-label">Inserisci un CV</label>
                        {{-- <input type="file" name="cv_path" id="create_cv_path"
                            class="form-control  @error('cv_path') is-invalid @enderror"> --}}
                        <div class=" mb-3 w-50">

                            <div class="position-relative ">
                                <div class="img_preview mb-3 ">
                                    <img class="d-block img-fluid " id="CV_Preview"
                                        src="https://via.placeholder.com/300x200">
                                </div>
                                <span id="cv_reset_btn" class="d-none"><i class="fa-solid fa-circle-xmark"></i></span>
                            </div>
                            <div>

                                <input type="file" name="cv_path" id="create_cv_path" accept="image/*"
                                    onchange="showCVPreview(event)"
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
                            <div class="mb-3"><strong>*</strong>Seleziona le tecnologie che utilizzi</div>
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">


                                    <input type="checkbox" class="form-check-input" id="{{ $technology->slug }} "
                                        name="technologies[]" value="{{ $technology->id }}">
                                    <label class="form-check-label"
                                        for="{{ $technology->slug }}">{{ $technology->name }}</label>
                                </div>
                            @endforeach
                            @error('technologies')
                                <div class="alert alert-danger my-3">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="text" value="{{ old('linkedin') }}"
                                class="form-control @error('linkedin') is-invalid @enderror" id="linkedin"
                                name="linkedin">
                            @error('linkedin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- <div class="form-text">*Minimo 3 caratteri e massimo 15 </div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="github" class="form-label">Github</label>
                            <input type="text" value="{{ old('github') }}"
                                class="form-control @error('github') is-invalid @enderror" id="github" name="github">
                            @error('github')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- <div class="form-text">*Minimo 3 caratteri e massimo 15 </div> --}}
                        </div>
                        <div>
                            <label for="visible" class="form-label "><strong>*</strong>Scegli la visibilit?? del tuo
                                profilo</label>
                            <select name="visible" id="visible"
                                class="w-25 form-control @error('visible') is-invalid @enderror" required>
                                <option value="" selected>Seleziona un opzione</option>
                                <option value="0">Invisibile</option>
                                <option value="1">Visibile</option>

                            </select>

                        </div>



                        <div class="mt-5">
                            <button type="submit" class="btn dev_btn me-1">Invia</button>
                            <button type="reset" class="btn btn-light border-dark">Reset</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection

<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            let input_profile_field = document.getElementById('create_profile_image');
            let delete_profile_Btn = document.getElementById('my_reset_btn');
            delete_profile_Btn.classList.remove('d-none')
            let profile_src = URL.createObjectURL(event.target.files[0]);
            let preview_profile = document.getElementById("uploadPreview");
            preview_profile.src = profile_src;
            preview_profile.style.display = "block";
            delete_profile_Btn.addEventListener('click', () => {
                profile_src = 'https://via.placeholder.com/300x200'
                preview_profile.src = profile_src
                input_profile_field.value = ''
                delete_profile_Btn.classList.add('d-none')
            })
        }
    }

    function showCVPreview(event) {
        if (event.target.files.length > 0) {
            let input_CV_field = document.getElementById('create_cv_path');
            let delete_CV_Btn = document.getElementById('cv_reset_btn');
            delete_CV_Btn.classList.remove('d-none')
            let cv_src = URL.createObjectURL(event.target.files[0]);
            let cv_preview = document.getElementById("CV_Preview");
            cv_preview.src = cv_src;
            cv_preview.style.display = "block";
            delete_CV_Btn.addEventListener('click', () => {
                cv_src = 'https://via.placeholder.com/300x200'
                cv_preview.src = cv_src
                input_CV_field.value = ''
                delete_CV_Btn.classList.add('d-none')
            })
        }
    }
</script>
