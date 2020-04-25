@extends('layouts.public')

@section('content')

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
            </tbody>
        </table>
    </div> 

@endsection