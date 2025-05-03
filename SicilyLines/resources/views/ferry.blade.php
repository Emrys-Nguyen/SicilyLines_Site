
    <title>Liste des Ferrys</title>

@extends ('template')
@section('ferry')
</head>
<body class="vh-100" style="background-color: #255483">
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
    <div class="bg text-white" style="width: 100%; height:auto">
        <div class="container" style="width: 100%; height:auto">
            <div class="card border border-0" style="width: 100%; height:auto">
                <div class="card-body bg text-white" style="background-color:#255483; width: 100%; height:auto">
                    <div class="text-center font-bold p-6" style="font-size: 2rem; color:white">
                        Ferrys
                    </div>
                    <div class="row">
                        @foreach($ferrys as $ferry)
                            <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center bg-light text-dark p-3 rounded-pill">
                                    <span class="text p-2" style="color:#255483;  font-size: 20px; " ><b>{{$ferry->nom}}</b></span>
                                    <div class="d-flex">
                                        <a role="button" class="btn" href="{{route('ferry.show',$ferry->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#255483" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                            </svg>
                                        </a>
                                        <form id="formDelete" action="{{route('ferry.destroy',$ferry->id)}}" method="POST" class="justify-content-center">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#255483" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-3" style="position:relative;bottom: 0%">
                        <button class="btn btn-light rounded-pill ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#255483" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                            </svg>
                        </button>
                        <div>
                            <button class="btn btn-light rounded-pill" style="color:#255483; font-size: 25px; "><b><</b></button>
                            <button class="btn btn-light rounded-pill" style="color:#255483; font-size: 25px; "><b>></b></button>
                        </div>
                        <a href="{{route('ferry.create')}}" role="button" class="btn btn-light rounded-pill" style="color:#255483;  font-size: 15px; "><b>Ajouter</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection