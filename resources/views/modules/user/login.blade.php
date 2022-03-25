@extends('default.master')  
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    @if(Session::has('loginSuccess'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{Session::get('loginSuccess')}}</strong>
        </div>
    @endif

    @if(Session::has('loginError'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{Session::get('loginError')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="login-head">
                <h1>Chat We</h1>  
                <p>Chatwe helps you to connect and <br> share with the people in your life.</p>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <form action="{{route('login')}}" method="POST" id="loginForm" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
        
                <div class="form-group">
                    <input type="submit" class="form-control" value="LOG IN" id="loginBtn">
                </div>
        
                <div class="forgotPassword">
                    <a href="{{route('forgot.password')}}"><p style="text-align: center">Forgotten Password ?</p></a>
                </div>
        
                <div class="form-group">
                    <a href="{{route('register.view')}}"><input type="button" class="form-control" value="CREATE NEW ACCOUNT" id="registerBtn"></a>
                </div>
        
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function(){
    var validateLoginForm = $('#loginForm').validate({
        rules:{
            email:{
                required:true,
                email:true
            },
            password:{
                required:true,
                minlength:8,
            }
        },
        messages:{
            email:{
                required:"Please Enter Your Email",
                email:"Please Enter A Valid Email With '@' Symbol",
            },
            password:{
                required:"Please Enter Your Password",
                minlength:"Please Enter 8 length password"
            }
        },
    });    
});
</script>
@endpush