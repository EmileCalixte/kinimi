<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }} - Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("css/master.css") }}">
    @if (preg_match('/maths-th\d/' , Route::current()->getName()))
      <link rel="stylesheet" href="{{ asset("css/mathematiques.css") }}">
    @endif
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <!-- Bannière pas affichée si histoire interactive -->
    @if (! preg_match('/maths-th\d/' , Route::current()->getName()))
      <div class="banniere">
        <a href="{{ route("home") }}">
          <img class="banniere" src="{{ asset("img/Banniere.jpg") }}" alt="banniere">
        </a>
      </div>
    @endif
    <header>
      <div id="mainHeader">
        @if (preg_match('/maths-th\d/' , Route::current()->getName()))
          <div class=" pull-left header-profil">
            <a class="btn btn-info" style="margin: 0;" href="{{ route("mathematiques") }}">Retour au menu Mathématiques</a>
          </div>
        @endif
        <!-- Boutons Connexion / Inscription / Profil / Déconnexion pas affichés si histoire interactive -->
        @if (! preg_match('/maths-th\d/' , Route::current()->getName()))
          <div class=" pull-right header-profil">
            @if (Route::has('login'))
              @auth
                <p>Bienvenue {{ Auth::user()->name }} !
                  <a href="{{ route("profil") }}" class="btn btn-info" style="margin: 0;"><span class="glyphicon glyphicon-user"></span> Mon profil</a>
                  <a href="{{ route("logout") }}" class="btn btn-danger" style="margin: 0;"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
                </p>
              @else
                <p>Tu n'es pas connecté.
                  <a href="{{ route('login') }}" class="btn btn-info" style="margin: 0;"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
                  <a href="{{ route('register') }}" class="btn btn-success" style="margin: 0;"><span class="glyphicon glyphicon-check"></span> Inscription</a>
                </p>
              @endauth
            @endif
          </div> <!-- header-profil -->
        @endif
      </div> <!-- #mainHeader -->

      <!-- Affichage du message d'avertissement si utilisateur pas connecté -->
      @if (!Auth::check())
        @if (Route::current()->getName() == 'home' or Route::current()->getName() == 'logout')
          <div class="alert alert-danger alert-dismissible" style="margin-bottom: 0px;">
            Attention, tu n'es pas connecté. Tu peux jouer sans compte, mais tu ne pourras pas sauvegarder ta progression. Pour accéder à toutes les fonctionnalités de {{ config('app.name', '') }}, <a href="{{ route('login') }}" class="alert-link">connecte-toi</a> ou <a href="{{ route('register') }}" class="alert-link">crée un compte</a> maintenant.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      @endif
      <noscript>
        <div class="alert alert-info" style="margin-top: 0px;"><span class="glyphicon glyphicon-info-sign"></span> Kinimi a besoin d'exécuter du Javascript pour fonctionner. Nous te recommandons d'utiliser <a href="https://www.mozilla.org/fr/firefox/new/" target="_blank">Firefox</a> ou <a href="https://www.google.fr/chrome/browser/desktop/index.html" target="_blank">Chrome</a> pour profiter pleinement de Kinimi. Si tu possèdes déjà un de ces deux navigateurs, vérifie que le Javascript est bien autorisé dans les paramètres de ton navigateur, ou contacte les administrateurs.</div>
      </noscript>
    </header>


    <div id="content">
      @yield ('site')
    </div>

  </body>
</html>
