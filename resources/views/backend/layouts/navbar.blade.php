 <nav class="navbar navbar-dark sticky-top px-3 py-0">
    <div class="nav-item dropdown">
        <img class="rounded-circle" src="backend/logo.png" alt="" style="width: 50px; height: 50px;">
    </div>
    <a href="#" class="navbar-brand px-6 mx-4 mb-3">
        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Note</h3>
    </a>
     <a href="#" class="sidebar-toggler flex-shrink-0">
         <i class="fa fa-bars"></i>
     </a>
     <form class="d-none d-md-flex mx-4">
         <input class="form-control bg-dark border-0" type="search" placeholder="Search">
     </form>
     <div class="navbar-nav align-items-center ms-auto">
         
         
             
             
         </div>
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <img class="rounded-circle me-lg-2" src="{{ url('img/user.jpg') }}" alt=""
                     style="width: 40px; height: 40px;">
                 <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                 <a href="#" class="dropdown-item">My Profile</a>
                 <a href="#" class="dropdown-item">Settings</a>
                 <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                     Logout
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf</form>

             </div>
         </div>
         
         
     </div>
 </nav>
