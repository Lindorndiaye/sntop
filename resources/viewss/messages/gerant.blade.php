@extends('layouts.app')

@section('content')
                <h6> 
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                </h6>
@endsection
