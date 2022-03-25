<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
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

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">{{Session::get('user')['name']}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">LOGOUT</a>
                    </li>
                @endif
                {{-- <li class="nav-item"> 
                    <a class="nav-link" href="{{route('register.view')}}">Register</a>
                </li> --}}
            </ul>

        </div>
    </nav>

</div>