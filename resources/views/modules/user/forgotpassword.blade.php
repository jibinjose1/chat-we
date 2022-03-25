@extends('default.master')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{Session::get('success')}}</strong>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>{{Session::get('error')}}</strong>
    </div>
@endif

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
    <form action="{{route('sent.reset.mail')}}" id="mailForm" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Enter Your Email</label>
            <input type="email" class="form-control" name="mail" id="mail">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" value="SEND MAIL" id="mailBtn">
        </div>
    </form>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        var validateLoginForm = $('#mailForm').validate({
            rules:{
                mail:{
                    required:true,
                    email:true
                }
            },
            messages:{
                mail:{
                    required:"Please Enter Your Email",
                    email:"Please Enter A Valid Email With @ Symbol",
                },
            },
        });    
    });
</script>
@endpush