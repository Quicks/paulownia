@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Welcome</div>

                    <div class="card-body">
                        <h2>Useful Tips:</h2>
                        <ul>
                            <li class="my-2">
                                You can get back to this page from any admin page by clicking on Paulownia logo at top-left page corner.
                            </li>
                            <li class="my-2">
                                <p class="m-0">Find out how to set up and use shop module powered by Bagisto</p>
                                <p class="m-0 ml-4">
                                    <a href="https://www.youtube.com/channel/UCbrfqnhyiDv-bb9QuZtonYQ/videos">Video lessons of shop adjust and use</a>
                                </p>
                                <p class="m-0  ml-4">
                                    <a href="https://bagisto.com/en/">Site of the shop library</a>
                                </p>
                            </li>
                            <li class="my-2">
                                <p class="m-0">
                                    When you create or edit news, galleries, treatises etc - use "Lang panel" on a right page side.
                                </p>
                                <p class="m-0 ml-4">
                                    The best - is to fill info in all languages, but to save it - all fields should be filled at least in one language.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
