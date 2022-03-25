@extends('default.master')
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{Session::get('success')}}</strong>
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{Session::get('error')}}</strong>
        </div>
    @endif

    <form action="{{route('register')}}" method="POST" id="registerForm" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Full Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="form-group">
            <input type="submit" class="form-control" value="REGISTER" id="registerBtn">
        </div>

        <div>
            <p style="text-align: center;font-weight:bold;">Already Have An Account ?</p>
        </div>

        <div class="form-group">
            <a href="{{route('login.view')}}"><button type="button" class="form-control" id="loginBtn">LOG IN</button></a>
        </div>
    </form>

</div>
@push('scripts')
<script>
$(document).ready(function(){
    var validateRegisterForm = $('#registerForm').validate({
        rules:{
            name:{
                required:true,
                minlength:5,
            },
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
            name:{
                required:"Please Enter Your Full Name",
                minlength:"Please Enter 5 Letter Name",
            },
            email:{
                required:"Please Enter Your Email",
                email:"Please Enter A Valid Email With @ Symbol",
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