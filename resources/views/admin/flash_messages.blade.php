<div id="flash-messages">
  @if($success = session('success'))
    <div class='alert alert-success flash-message'>
      {{$success}}
    </div>
  @elseif ($warning = session('warning'))
    <div class='alert alert-warning flash-message'>
      {{$warning}}
    </div>
  @elseif ($error = session('error'))
    <div class='alert alert-danger flash-message'>
      {{$error}}
    </div>
  @elseif ($info = session('info'))
    <div class='alert alert-info flash-message'>
      {{$info}}
    </div>
  @endif
</div>

@push('scripts')
<script>
  $(document).ready(function(){
    setTimeout(function(){
      $('#flash-messages').fadeOut('slow')
    }, 8000)
  })
</script>

@endpush