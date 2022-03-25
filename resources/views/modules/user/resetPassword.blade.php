@extends('default.master')

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

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
    <form action="{{route('reset.password')}}" id="resetForm" method="POST">
        @csrf

        <div class="form-group">
            <label for="">New Password</label>
            <input type="password" class="form-control" name="newpassword" id="newpassword">
        </div>

        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="confimpassword" id="confimpassword">
        </div>

        <div class="form-group">
            <input type="hidden" name="userid" value="{{$encryptID}}" id="userid">
            <input type="submit" class="form-control" value="RESET NOW" id="resetBtn">
        </div>
    </form>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        var validateLoginForm = $('#resetForm').validate({
            rules:{
                newpassword:{
                    required:true,
                    minlength:8,
                },
                confimpassword:{
                    required:true,
                    minlength:8,
                }
            },
            messages:{
                newpassword:{
                    required:"Please Enter Your Password",
                    minlength:"Please Enter 8 length password",
                },
                confimpassword:{
                    required:"Please Enter Your Password",
                    minlength:"Please Enter 8 length password"
                }
            },
        });    
    });
</script>
@endpush