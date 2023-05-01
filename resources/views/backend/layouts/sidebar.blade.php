<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-secondary">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Note</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ url('img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
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
            <div>
                <a href="/1" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            </div>
            <div>
                <a href="{{ route('administrateurs.index') }}" class="nav-item nav-link"><i
                        class="fa fa-th me-2"></i>Administrateur</a>
                <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Etudiant</a>
                <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Professeur</a>
                <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Filiere</a>
                <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Module</a>
                <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Element_Module</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf</form>

            </div>
        </div>
    </nav>
</div>
