@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
{{--                @dd((session()->all()))--}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                @php
                    $as= "asu";
                @endphp
                <x-alert-component>
                    <x-slot:jancuk>
                        Iki jancuk
                    </x-slot:jancuk>

                    <strong>Whoops!</strong> Something went wrong!
                </x-alert-component>
            </div>
        </div>
    </div>
</div>
@endsection
