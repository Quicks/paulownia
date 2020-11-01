@extends('layouts.public')

@section('content')
<div id='login-wrapper' class='col-md-5'></div>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '/profile/login-form',
            success: function(response){
                $('#login-wrapper').html(response)
            }
        }) 
    })
</script>
@endsection