@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user())
                        {{ __('Studio!') }}
                        <br>
                        <hr>
                        <div class="modal-footer">
                            <form action="{{ url('logout') }}" method="POST">
                              @csrf
                              <button class="btn btn-danger" type="submit">Logout</button>
                            </form>
                        </div>
                    @else
                        {{ __('Welcome to Home!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
