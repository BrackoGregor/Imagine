@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table>
            <tr>
                <th>Label:</th>
                <th>Title:</th>
                <th>Body:</th>
            </tr>

            @foreach($response1 as $req)     

            <tr>
                @foreach($req->labels as $label)
                <th>{{nl2br(e($label->name))}}</th>   
                @endforeach
                <th>{{nl2br(e($req->title))}}</th> 
                <th>{{nl2br(e($req->body))}}</th>         
            </tr>
            
            @endforeach
        </table>
    </div>
</div>
@endsection