@extends('default.master')
@section('content')
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 p-0">
    @if(Session::has('loginSuccess'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{Session::get('loginSuccess')}}</strong>
        </div>
    @endif
        <nav class="navbar navbar-expand-lg navbar-light">
            @if(Session::has('user'))
                <li class="navbar-brand" href="">CHATWE</li>
            @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
                <ul class="navbar-nav nav-auto">
                    
                    @if(Session::has('user'))
    
                        <li class="nav-item dropdown">
                            {{-- <a class="nav-link" href="{{route('profile')}}"></a> --}}
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Session::get('user')['name']}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('profile')}}">PROFILE</a>
                                <a class="dropdown-item" href="{{route('logout')}}">LOGOUT</a>
                            </div>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{route('reset.password')}}">RESET PASSWORD</a>
                        </li> --}}

                    @endif
                </ul>
    
            </div>
        </nav>
    </div>
@endsection