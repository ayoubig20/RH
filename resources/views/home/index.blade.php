@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-2">

            <div class="card" style="width:400px">
                <img class="card-img-top" src="{{ asset('/img/1.png') }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text.</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-2">

            <div class="card" style="width:400px">
                <img class="card-img-top" src="{{ asset('/img/1.png') }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text.</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-2">

            <div class="card" style="width:400px">
                <img class="card-img-top" src="{{ asset('/img/1.png') }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text.</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
        </div>
        </div>
    @endsection
