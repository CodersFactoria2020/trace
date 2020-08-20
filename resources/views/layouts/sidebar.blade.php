
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
  <div class="nav-item fixed-top logo">
        <a href="/home"><img src="img/Logo_transparente_sin_texto.png" alt="logotipo de traCE" class="img-fluid"></a>
      </div>    

      <div class="nav-item full-vertical-align">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link primary-green active" href="/dashboard">
              <span><i class="icofont-home"></i></span>
              Inici <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link primary-green" href="/user">
              <span><i class="icofont-users-alt-3"></i></span>
              Usuaris
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link primary-green" href="/activity">
              <span><i class="icofont-attachment"></i></span>
              Activitats
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link primary-green" href="/areas">
              <span><i class="icofont-list"></i></span>
              Àreas
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link primary-green" href="/workplans">
              <span><i class="icofont-calendar"></i></span>
              Plans de treball
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link primary-green" href="/team">
              <span><i class="icofont-id"></i></span>
              Equip de gestió
            </a>
          </li>     
        
        </ul>
      </div>

      <div class="nav-item logoutbtn">
        <a class="nav-link" href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <span>
            <i class="icofont-logout"></i></i>
          </span>
          Tancar sessió
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
      </div>
    
  </div>
</nav>    

