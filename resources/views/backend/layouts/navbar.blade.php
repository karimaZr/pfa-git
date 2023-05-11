 <nav class="navbar navbar-expand bg-secondary sticky-top px-3 py-0">
    
      <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
     </a>
     <form class="d-none d-md-flex mx-6">
        <input class="form-control bg-dark border-0" type="search" placeholder="Search">
     </form>
     <div class="navbar-nav align-items-center ms-auto">
       
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                @if(auth()->user()->role=='Etudiant')
                <img class="rounded-circle" src="backend2\img\testimonial-1.jpg"
                    style="width: 50px; height: 50px;">
                @else
                <img class="rounded-circle" src="backend2\img\testimonial-2.jpg"
                style="width: 50px; height: 50px;">
                @endif
                 <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                 <a href="#" class="dropdown-item">Profile</a>
                 <a href="#" class="dropdown-item">Paramétres</a>
                 <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                     Déconnexion
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf</form>

             </div>
         </div>
        
         <div class="img-nav">
            <img class="rounded-circle" src="backend/logo.png" alt="" style="width: 50px; height: 50px;">
    
         </div>





     </div>
     
    </nav>
