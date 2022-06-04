<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="flags-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    @switch(\Illuminate\Support\Facades\App::getLocale())
      @case('en')
      <img src="/images/en.svg" alt="English">English</a>
  @break
  @case('fr')
  <img src="/images/fr.svg" alt="French">French</a>
  @break
  @case('es')
  <img src="/images/es.svg" alt="Spanish">Spanish</a>
  @break
  @case('it')
  <img src="/images/it.svg" alt="Italian">Italian</a>
  @break
  @case('de')
  <img src="/images/de.svg" alt="Deutsch">Deutsch</a>
  @break
  @endswitch
  </a>
  <ul class="dropdown-menu" aria-labelledby="flags-dropdown" id="flags-dowpdown-list">
    <li><a class="dropdown-item" href="{{ route(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName(), array_merge(\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters(), ['locale' => 'en'])) }}"><img src="/images/en.svg" alt="English">English</a></li>
    <li><a class="dropdown-item" href="{{ route(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName(), array_merge(\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters(), ['locale' => 'fr'])) }}"><img src="/images/fr.svg" alt="French">French</a></li>
    <li><a class="dropdown-item" href="{{ route(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName(), array_merge(\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters(), ['locale' => 'es'])) }}"><img src="/images/es.svg" alt="Spanish">Spanish</a></li>
    <li><a class="dropdown-item" href="{{ route(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName(), array_merge(\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters(), ['locale' => 'it'])) }}"><img src="/images/it.svg" alt="Italian">Italian</a></li>
    <li><a class="dropdown-item" href="{{ route(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName(), array_merge(\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters(), ['locale' => 'de'])) }}"><img src="/images/de.svg" alt="Deutsch">Deutsch</a></li>
  </ul>
</li>