@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @guest
                    {{ __('Please log in!') }}
                    @else
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <p>{{ __('Logged in! ') }}</p>
                            <form>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="{{ url('/auth/redirect') }}" class="btn btn-github"> GitHub</a>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endguest

                    
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection
