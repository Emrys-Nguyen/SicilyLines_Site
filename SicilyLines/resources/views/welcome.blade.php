@extends('template')
@section('welcome')
<div class="absolute" style="height: 100%;width:100%;background:#255483;">
  <div class="relative justify-center rounded-5 bg-light rounded-top-0 items-center" style="background:#255483;">
    <div class="top-0">
      <div class="absolute top-0 left-0 p-6 z-10">
        <img src="{{url('/photo/logo.png')}}" alt="logo.png" width="75px">
      </div>
      <div class="text-center font-bold p-6" style="font-size: 2rem; color:#255483">
        Sicily Lines
      </div>
      <div class="absolute top-0 right-0 p-6 z-10">
          @if (Route::has('login'))
            @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                      this.closest('form').submit();"
                      class="btn rounded-pill font-semibold  dark:hover:text-white focus:outline focus:outline-2 focus:outline-white"
                      style="background:#255483;color:white">
                    {{ __('Déconnexion') }}
                </x-dropdown-link>
              </form>
          @else
              <a role="button" href="{{ route('login') }}" class="btn rounded-pill font-semibold  dark:hover:text-white focus:outline focus:outline-2 focus:outline-white" style="background:#255483;color:white">Connexion</a>
            @endauth
              
          @endif
      </div>
    </div>
  </div>
  <div id="carouselExampleFade" class="carousel slide carousel-fade" style="margin-top: 10rem">
    <div class="carousel-inner rounded-5" style="width: 800px; height:450px; top:0%; left: 50%; transform: translate(-50%);">
      <div class="carousel-item active">
        <img src="{{url('/photo/sicile_1.png')}}" class="d-block" alt="sicile_1" width="100%" height="100%">
      </div>
      <div class="carousel-item">
        <img src="{{url('/photo/sicile_2.png')}}" class="d-block" alt="sicile_2" width="100%" height="100%">
      </div>
      <div class="carousel-item">
        <img src="{{url('/photo/sicile_3.png')}}" class="d-bloc" alt="sicile_3" width="100%" height="100%">
      </div>
      <div class="carousel-item">
        <img src="{{url('/photo/sicile_4.png')}}" class="d-block" alt="sicile_4" width="100%" height="100%">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon rounded-circle" aria-hidden="false"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon rounded-circle" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  @if (Route::has('login'))
    @auth
      <div class="d-flex justify-content-center align-items-end" style="margin-top: 5rem">
        <a role="button" href="{{url('/ferry')}}" class="btn rounded-pill font-semibold  dark:hover:text-white focus:outline focus:outline-2 focus:outline-white" style="background:white;color:#255483;font-size:2rem">Voir les ferrys</a>
      </div>
    @endauth
  @endif
</div>
@endsection