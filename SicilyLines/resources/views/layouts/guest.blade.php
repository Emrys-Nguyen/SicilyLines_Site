@extends('template')
@section('login')
<body>
    <div class="absolute bg-light" style="height: 100%;width:100%;background:#255483;">
        <div class="relative justify-center rounded-5 rounded-top-0 items-center" style="background:#255483;">
            <div class="top-0">
                <div class="absolute top-0 left-0 p-6 z-10">
                    <img src="{{url('/photo/logo.png')}}" alt="logo.png" width="75px">
                  </div>
                <div class="text-center font-bold p-6" style="font-size: 2rem; color:white">
                Sicily Lines
                </div>
                <div class="absolute top-0 right-0 p-6 z-10">
                    <a role="button" href="{{ url('welcome') }}" class="btn rounded-pill font-semibold dark:hover:text-white focus:outline focus:outline-2 focus:outline-white" style="color: white">Accueil</a> 
                </div>
            </div>
        </div>
        {{ $slot }}
</body>
@endsection

