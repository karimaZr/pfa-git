<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-secondary">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Note</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ url('img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{auth()->user()->name}}</h6>
                <span>{{auth()->user()->role}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
          <div>
          <a href="/1" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a> 
          </div>
          <div>
          <a href="{{route('administrateurs.index')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Administrateur</a>
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Etudiant</a>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Professeur</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Filiere</a>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Module</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Element_Module</a>
          </div>
       </div>
    </nav>
  </div>