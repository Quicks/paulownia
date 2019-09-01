@extends("layouts.app")

@section('content')

    <a href="{{url('/admin/factura/generate')}}">
        <button class="btn btn-info btn-sm">Export as .doc</button>
    </a>

@endsection