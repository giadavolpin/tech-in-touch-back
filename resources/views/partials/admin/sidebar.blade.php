<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 " style="width: 230px;">
    <a href="/admin" id="logo-sidebar"
        class="d-flex align-items-center  mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

        <span class="fw-bolder">TechInTouch</span>
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

                Profilo
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.projects.index') }}"
                class="nav-link  {{ Route::currentRouteName() == 'admin.projects.index' ? 'active_li' : '' }}"
                aria-current="page">
                <i class="fa-solid fa-diagram-project mx-1"></i>

                Progetti
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.leads.index') }}"
                class="nav-link  {{ Route::currentRouteName() == 'admin.leads.index' ? 'active_li' : '' }}"
                aria-current="page">
                <i class="fa-solid fa-envelope mx-1"></i>


                Messaggi
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.reviews.index') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.reviews.index' ? 'active_li' : '' }} "
                aria-current="page">

                <i class="fa-solid fa-book mx-1"></i>

                Recensioni
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link  " aria-current="page">

                <i class="fa-solid fa-credit-card mx-1"></i>

                Pagamenti
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
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
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
