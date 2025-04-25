<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Social network</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
          <a class="nav-link" href="{{ route('homepage') }}">Accueil</a>
      </li>

    @guest
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
      </li>
      @endguest
  
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profiles.index') }}">Profil</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('settings.index') }}">Information</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('profiles.create') }}">Ajouter profil</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('publications.index') }}">publication</a>
      </li>

    </ul>
    @auth
    <ul  class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('publications.create') }}">Ajouter publication</a>
    </li>
    </ul>
    <ul class="navbar-nav navbar-nav-icons flex-row">
      <li class="nav-item float-right">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" 
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ auth()->user()->email}}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            
            <a class="dropdown-item" href="{{ route('login') }}">Se connecter</a>
          </div>
        </div>
      </li>
    </ul>
    @endauth
  </div>
</nav>
