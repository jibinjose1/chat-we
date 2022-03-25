@extends('default.master')
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
    <h4>Hi, {{$name}}</h4>
    <p>You recently requested to reset your password for your Chat We Account.</p>
    <p>Click the link below to reset it</p>
    <a href="{{route('reset.password.view',compact('id'))}}">{{$token}}</a>
    <br>
    <br>
    <p><b>Note:</b> You did not request a password request to change the password for your Chat We account, please ignore this email or reply to let us know. 
        For security purposes, this link will expire in 24 hours from the time it was sent.</p>

    <p><strong>Thanks</strong></p>
    <p>Team Chat We</p>
</div>