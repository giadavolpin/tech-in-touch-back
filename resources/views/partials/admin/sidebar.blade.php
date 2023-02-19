<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 ">
    <a href="http://localhost:5174/" id="logo-sidebar"
        class="d-flex align-items-center  mb-3 mx-2 text-white text-decoration-none">

        <span class="fw-bolder d-none d-md-block">TechInTouch</span>
        <span class="d-block d-md-none"><i class="fa-solid fa-house"></i></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        {{-- <li>

            <a href="{{ route('admin.dashboard') }}"
                class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}">
                <i class="fa-solid fa-gauge mx-1"></i>
                Dashboard
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('admin.professionists.index') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.professionists.index' ? 'active_li' : '' }}"
                aria-current="page">
                <i class="fa-solid fa-user mx-1"></i>

                <span class="d-none d-md-inline-block">Profilo</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.projects.index') }}"
                class="nav-link  {{ Route::currentRouteName() == 'admin.projects.index' ? 'active_li' : '' }}"
                aria-current="page">
                <i class="fa-solid fa-diagram-project mx-1"></i>

                <span class="d-none d-md-inline-block">Progetti</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.leads.index') }}"
                class="nav-link  {{ Route::currentRouteName() == 'admin.leads.index' ? 'active_li' : '' }}"
                aria-current="page">
                <i class="fa-solid fa-envelope mx-1"></i>


                <span class="d-none d-md-inline-block">Messaggi</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.reviews.index') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.reviews.index' ? 'active_li' : '' }} "
                aria-current="page">

                <i class="fa-solid fa-book mx-1"></i>

                <span class="d-none d-md-inline-block">Recensioni</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.generatetoken') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.generatetoken' ? 'active_li' : '' }} "
                aria-current="page">

                <i class="fa-solid fa-rocket mx-1"></i>

                <span class="d-none d-md-inline-block">Sponsorizzazioni</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.payments.index') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.payments.index' ? 'active_li' : '' }} "
                aria-current="page">

                <i class="fa-solid fa-credit-card mx-1"></i>

                <span class="d-none d-md-inline-block">Pagamenti</span>
            </a>
        </li>


        {{-- <li class="nav-item">
            <a href="{{ route('admin.technologies.index') }}"
                class="nav-link text-white {{ Route::currentRouteName() == 'admin.technologies.index' ? 'bg-secondary' : '' }}"
                aria-current="page">
                <i class="fa-solid fa-book mx-1"></i>

                Tecnologie
            </a>
        </li> --}}

        {{-- @if (Auth::check() && Auth::user()->isAdmin()) --}}
        {{-- <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}"
                class="nav-link text-white {{ Route::currentRouteName() == 'admin.categories.index' ? 'bg-secondary' : '' }}"
                aria-current="page"><i class="fa-solid fa-folder-open mx-1"></i>
                Categories
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.tags.index') }}"
                class="nav-link text-white {{ Route::currentRouteName() == 'admin.tags.index' ? 'bg-secondary' : '' }}"
                aria-current="page"><i class="fa-solid fa-bookmark fa-lg fa-fw "></i>
                Tags
            </a>
        </li>
        <li class="nav-item">
            <a href="#"
                class="nav-link text-white"
                aria-current="page">
                <i class="fa-solid fa-users fa-lg fa-fw "></i>
                Users
            </a>
        </li> --}}

        {{-- @endif --}}






    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            {{-- <img src="{{ asset('storage/' . $professionist->profile_image) }}" alt="" width="32"
                height="32" class="rounded-circle me-2"> --}}
            <strong>{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small" aria-labelledby="dropdownUser1">
            {{-- <li><a class="dropdown-item" href="{{ route('admin.projects.create') }}">New project...</a></li> --}}
            {{-- <li><a class="dropdown-item" href="#">Impostazioni</a></li>
            <li><a class="dropdown-item" href="#">Profilo</a></li> --}}
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout">
                    Sign out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>


{{-- <a class="dropdown-item" href="#">Sign out</a> --}}
