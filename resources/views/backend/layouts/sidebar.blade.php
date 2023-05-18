<div class="sidebar custom-bg pe-4 pb-3">
    <nav class="navbar custom-bg navbar-custom-bg">
        <a  class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit "></i>Note</h3>     
        </a>
            <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('img/' . auth()->user()->photo) }}" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>

            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                <span>{{ auth()->user()->role }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">        
            @if (auth()->user()->role == 'Admin')
            <div>
                <a href="/dashboard/Admin" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                <a href="{{ route('administrateurs.index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Administrateur</a>
                <a href="{{ route('etudiants.index') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Etudiant</a>
                <a href="{{ route('professeurs.index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Professeur</a>
                <a href="{{ route('filiere.index') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Filiere</a>
                <a href="{{ route('modules.index') }}" class="nav-item nav-link"><i
                            class="fa fa-laptop me-2"></i>Module</a>
                    {{-- <div class="dropdown-menu bg-transparent border-1">
                        <a href="{{ route('modules.index') }}" class="dropdown-item">Module</a>
                        {{-- <a href="{{ route('administrateurs.index') }}" class="dropdown-item">Note-Module</a> --}}
                    {{-- </div> --}} 
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-laptop me-2"></i>E_Module</a>
                    
                    <div class="dropdown-menu  border-0">
                        <a href="{{ route('element_modules.index') }}" class="dropdown-item">Element_Module</a>
                        {{-- <a href="{{ route('administrateurs.index') }}" class="dropdown-item">Note-Element_Module</a> --}}
                    </div>
                </div>
               
                <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf</form>

            </div>
            @elseif (auth()->user()->role == 'prof')
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu  border-0">

                        @foreach ($element as $e)
                            <a href="{{ route('note', ['id' => $e->id]) }}" class="dropdown-item">
                                {{ $e->Nom }}

                            </a>
                        @endforeach

                    </div>
                </div>
            @elseif (auth()->user()->role == 'Etudiant')
                <div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-table me-2"></i>Note modules</a>
                        <div class="dropdown-menu  border-0">
                            <a href="{{ route('note_module', ['id_S' => 'S1']) }}" class="dropdown-item">Semstre1</a>
                            <a href="{{ route('note_module', ['id_S' => 'S2']) }}" class="dropdown-item">Semstre2</a>

                        </div>
                    </div>
                    <a href="{{route('note_semestre')}}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Note d'année</a>
                </div>
            @endif
            <a href="{{route('home')}}"  class="nav-link "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 448 512">
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg> Profile</a>

            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><svg
                    xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 640 512">
                    <path
                        d="M308.5 135.3c7.1-6.3 9.9-16.2 6.2-25c-2.3-5.3-4.8-10.5-7.6-15.5L304 89.4c-3-5-6.3-9.9-9.8-14.6c-5.7-7.6-15.7-10.1-24.7-7.1l-28.2 9.3c-10.7-8.8-23-16-36.2-20.9L199 27.1c-1.9-9.3-9.1-16.7-18.5-17.8C173.9 8.4 167.2 8 160.4 8h-.7c-6.8 0-13.5 .4-20.1 1.2c-9.4 1.1-16.6 8.6-18.5 17.8L115 56.1c-13.3 5-25.5 12.1-36.2 20.9L50.5 67.8c-9-3-19-.5-24.7 7.1c-3.5 4.7-6.8 9.6-9.9 14.6l-3 5.3c-2.8 5-5.3 10.2-7.6 15.6c-3.7 8.7-.9 18.6 6.2 25l22.2 19.8C32.6 161.9 32 168.9 32 176s.6 14.1 1.7 20.9L11.5 216.7c-7.1 6.3-9.9 16.2-6.2 25c2.3 5.3 4.8 10.5 7.6 15.6l3 5.2c3 5.1 6.3 9.9 9.9 14.6c5.7 7.6 15.7 10.1 24.7 7.1l28.2-9.3c10.7 8.8 23 16 36.2 20.9l6.1 29.1c1.9 9.3 9.1 16.7 18.5 17.8c6.7 .8 13.5 1.2 20.4 1.2s13.7-.4 20.4-1.2c9.4-1.1 16.6-8.6 18.5-17.8l6.1-29.1c13.3-5 25.5-12.1 36.2-20.9l28.2 9.3c9 3 19 .5 24.7-7.1c3.5-4.7 6.8-9.5 9.8-14.6l3.1-5.4c2.8-5 5.3-10.2 7.6-15.5c3.7-8.7 .9-18.6-6.2-25l-22.2-19.8c1.1-6.8 1.7-13.8 1.7-20.9s-.6-14.1-1.7-20.9l22.2-19.8zM112 176a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM504.7 500.5c6.3 7.1 16.2 9.9 25 6.2c5.3-2.3 10.5-4.8 15.5-7.6l5.4-3.1c5-3 9.9-6.3 14.6-9.8c7.6-5.7 10.1-15.7 7.1-24.7l-9.3-28.2c8.8-10.7 16-23 20.9-36.2l29.1-6.1c9.3-1.9 16.7-9.1 17.8-18.5c.8-6.7 1.2-13.5 1.2-20.4s-.4-13.7-1.2-20.4c-1.1-9.4-8.6-16.6-17.8-18.5L583.9 307c-5-13.3-12.1-25.5-20.9-36.2l9.3-28.2c3-9 .5-19-7.1-24.7c-4.7-3.5-9.6-6.8-14.6-9.9l-5.3-3c-5-2.8-10.2-5.3-15.6-7.6c-8.7-3.7-18.6-.9-25 6.2l-19.8 22.2c-6.8-1.1-13.8-1.7-20.9-1.7s-14.1 .6-20.9 1.7l-19.8-22.2c-6.3-7.1-16.2-9.9-25-6.2c-5.3 2.3-10.5 4.8-15.6 7.6l-5.2 3c-5.1 3-9.9 6.3-14.6 9.9c-7.6 5.7-10.1 15.7-7.1 24.7l9.3 28.2c-8.8 10.7-16 23-20.9 36.2L315.1 313c-9.3 1.9-16.7 9.1-17.8 18.5c-.8 6.7-1.2 13.5-1.2 20.4s.4 13.7 1.2 20.4c1.1 9.4 8.6 16.6 17.8 18.5l29.1 6.1c5 13.3 12.1 25.5 20.9 36.2l-9.3 28.2c-3 9-.5 19 7.1 24.7c4.7 3.5 9.5 6.8 14.6 9.8l5.4 3.1c5 2.8 10.2 5.3 15.5 7.6c8.7 3.7 18.6 .9 25-6.2l19.8-22.2c6.8 1.1 13.8 1.7 20.9 1.7s14.1-.6 20.9-1.7l19.8 22.2zM464 304a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                </svg>Paramétres</a>
            <div class="dropdown-menu  border-0">
                <a href="{{route('password.change')}}" class="dropdown-item">Changer mot de passe</a>
            </div>
            <a class=" nav-link " href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg> Déconnexion
            </a>

        </div>

    </nav>
</div>
