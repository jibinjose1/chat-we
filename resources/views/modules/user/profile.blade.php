@extends('default.master')
@section('content')
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 p-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav nav-auto">        
                @if(Session::has('user'))

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{Session::get('user')['name']}}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reset.password')}}">RESET PASSWORD</a>
                    </li>

                @endif
            </ul>
        </nav>
    </div>
@endsection