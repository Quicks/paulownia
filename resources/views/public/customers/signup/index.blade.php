@extends('layouts.public')

@section('content')
<div id='register-wrapper'></div>
<script>
    $(document).ready(function(){
        $.ajax({
            url: '/profile/register-form',
            success: function(response){
                $('#register-wrapper').html(response)
            }
        }) 
    })
</script>
@endsection
