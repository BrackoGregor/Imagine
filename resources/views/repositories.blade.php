@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <table>
            <tr>
                <th>Name:</th>
            </tr>
            
            @foreach($response1 as $req)  
            <tr>
                <th><a href='http://127.0.0.1:8000/issues/{{$username}}/{{$req->name}}/{{$token}}'>{{nl2br(e($req->name))}}</a></th>           
            </tr>
            
            @endforeach
            </table>
    </div>
</div>
@endsection