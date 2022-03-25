@extends('default.master')
@section('content')
    <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12 p-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            @if(Session::has('user'))
                <li class="navbar-brand" href="">CHATWE</li>
            @endif
        </nav>
    </div>
@endsection