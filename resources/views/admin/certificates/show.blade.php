@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Certificate {{ $certificate->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/certificates') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if(bouncer()->hasPermission('certificates.update'))
                            <a href="{{ url('/admin/certificates/' . $certificate->id . '/edit') }}" title="Edit and Activate Certificate"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit and Activate</button></a>
                        @endif
                        @if(bouncer()->hasPermission('certificates.destroy'))
                            <form method="POST" action="{{ url('admin/certificates' . '/' . $certificate->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Certificate" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $certificate->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $certificate->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Active </th>
                                        <td> {{ $certificate->active }} </td>
                                    </tr>
                                    <tr>
                                        <th> String1 </th>
                                        <td> {{ $certificate->string1 }} </td>
                                    </tr>
                                    <tr>
                                        <th> String2 </th>
                                        <td> {{ $certificate->string2 }} </td>
                                    </tr>
                                    <tr>
                                        <th> String3 </th>
                                        <td> {{ $certificate->string3 }} </td>
                                    </tr>
                                    <tr>
                                        <th> Text </th>
                                        <td> {{ $certificate->text }} </td>
                                    </tr>
                                    @if($certificate->active)
                                        <tr>
                                            <th> QR code link </th>
                                            <td> 
                                                <a href="{{$certificate->qrCodeLink}}">
                                                    {{$certificate->qrCodeLink}}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> QR code image </th>
                                            <td><img src="{{asset('storage/'.$certificate->qrCodeImage)}}"></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
