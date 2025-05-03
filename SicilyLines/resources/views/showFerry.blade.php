@extends('template')
@section('showFerry')
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
    <div class="container mt-4">
        <div class="text-center font-bold p-6" style="font-size: 4rem; color:white">
            Ferry - {{$ferry->nom}}
        </div>
        <div class="card p-4 bg-light mb-3 rounded-5" style="background-color: #d9d9d9;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="../photo/<?php echo $ferry->photo?>" alt="ferry.jpg" style="width:450px;height:auto">
                </div>
                <div class="col-md-3">
                    <div class="font-semibold" style="color: #255483;font-size:20px">
                        Longueur : {{$ferry->longueur}}m
                    </div>
                    <div class="font-semibold" style="color: #255483;font-size:20px">
                        Largeur : {{$ferry->largeur}}m
                    </div>
                    <div class="font-semibold" style="color: #255483;font-size:20px">
                        Vitesse: {{$ferry->vitesse}} noeud
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="font-semibold" style="color: #255483;font-size:20px">
                        Equipements : <br>
                        @foreach($ferry->equipements as $equipement)
                            <li>{{$equipement->libelle}}</li>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a role="button" href="{{url('/ferry')}}" class="btn btn-secondary rounded-5" style="background-color: white; color:#255483;  font-size: 25px; font-weight: 500;">Retour</a>          
        </div>
    </div>
</div>
@endsection