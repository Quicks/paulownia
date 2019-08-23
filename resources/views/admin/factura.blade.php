@extends("layouts.app")

@section('content')

    <div class="container-fluid">
        <a class="word-export" href="javascript:void(0)">
            <button class="btn btn-info btn-sm">Export as .doc </button>
        </a>

         <div id="page-content">

             {{--Invoice template should be here--}}

        </div>

    </div>

@endsection

@push('scripts')

    <script src="{{ asset('js/FileSaver.js') }}"></script>
    <script src="{{ asset('js/jquery.wordexport.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {
         $("a.word-export").click(function(event) {
               $("#page-content").wordExport('factura');
            });
        });
    </script>

@endpush
