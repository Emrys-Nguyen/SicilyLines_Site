<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>
<body style="background-color: #255483;">
@extends ('template')
@section('create')
<?php
    $liste_equipement = array();
?>
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
        <div class="text-center font-bold p-6" style="font-size: 2rem; color:white">
            Ajouter
        </div>
        <div class="card p-4 bg-light mb-3 rounded-5" style="background-color: #d9d9d9;">
            <form action="{{route('ferry.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label class="form-label"style="color:#255483; font-weight: 700;">Nom du Ferry :</label>
                    <label for="nom" class="form-label text-white">Entrez le nom</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder=""  value="{{old('nom')}}">
                    @error('nom')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="longueur" class="form-label" style="color:#255483; font-weight: 700;">Longueur :</label>
                    <div class="input-group">
                        <input type="number" class="form-control @error('longueur') is-invalid @enderror" name="longueur" id="longueur" placeholder="" value="{{old('longueur')}}">
                        <span class="input-group-text" style="color:#255483; font-weight: 700;">mètres</span>
                    </div> 
                    @error('longueur')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="largeur" class="form-label"style="color:#255483; font-weight: 700;">Largeur :</label>
                    <div class="input-group">
                        <input type="number" class="form-control @error('largeur') is-invalid @enderror" name="largeur" id="largeur" placeholder=" " value="{{old('largeur')}}"><span class="input-group-text"style="color:#255483; font-weight: 700;">mètres</span>
                    </div>
                    @error('largeur')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="vitesse" class="form-label" style="color:#255483; font-weight: 700;">Vitesse :</label><div class="input-group">
                    <input type="number" class="form-control @error('vitesse') is-invalid @enderror" name="vitesse" id="vitesse" placeholder=" " value="{{old('vitesse')}}">
                    <span class="input-group-text"style="color:#255483; font-weight: 700;">noeuds</span>
                </div> 
                    @error('vitesse')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" style="color:#255483; font-weight: 700;">Photo :</label>
                    <label for="photo" class="form-label text-white">Entrez une photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" placeholder=" " value="{{old('photo')}}">
                    @error('photo')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="col-md-6">
                    <label for='equipements' class="form-label" style="color:#255483; font-weight: 700;">Equipements :</label>
                    <div class="dropdown" id="equipements">
                        <div class="row g-0">
                            <button class="btn dropdown-toggle col-md-1" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="col-md-11" style="border: solid">
                                @foreach($liste_equipement as $equipement)
                                    <div class="rounded-pill" style="background-color: #255483">
                                    </div>
                                @endforeach
                            </div>
                            <ul class="dropdown-menu">
                                @foreach($equipements as $equipement)
                                <li><input type="checkbox" name="equipement[]" value="{{$equipement->id}}">{{$equipement->libelle}}</input></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="control d-flex justify-content-end">
                    <button class="btn btn-primary me-2 rounded-5" style="background-color: #255483; color:#d9d9d9;  font-size: 25px; font-weight: 500;">Envoyer</button>
                    <a role="button" href="{{url('/ferry')}}" class="btn btn-secondary rounded-5" style="background-color: #255483; color:#d9d9d9;  font-size: 25px; font-weight: 500;">Retour</a>          
                </div>  
            </form>
        </div>
        @endsection
    </div>
</body>


</html>
