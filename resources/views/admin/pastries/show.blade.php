@extends('layouts.app')

@section('content')

    <div class="container">

        @include("partials.success-error-messages")

        <div class="text-center mt-4 mb-5">
            <h1>{{ucfirst($pastry->name)}}</h1>
        </div>
        <div class="mb-5">
            <h5>Ingredienti:</h5>
            <h6 class="text-secondary">{{$pastry->ingredients}}</h6>
        </div>
        <div class="mb-5">
            <h5>Prezzo:</h5>
            <h6 class="text-secondary">€ {{str_replace(".", ",", number_format($pastry->price, 2))}}</h6>
        </div>
        <div class="mb-5">
            <h5>Prezzo in sconto:</h5>
            <h6 class="text-secondary">€ {{str_replace(".", ",", number_format($pastry->discount_price, 2))}}</h6>
        </div>
        <div class="mb-5">
            <h5>Quantità:</h5>
            <h6 class="text-secondary">{{$pastry->quantity}}</h6>
        </div>
        <div class="mb-5">
            <h5>Messo in vendita il:</h5>
            <h6 class="text-secondary">{{date("d/m/y", strtotime($pastry->created_at))}}</h6>
        </div>
        <div>
            <a class="btn btn-success" href="{{route("admin.pastries.edit", ["pastry" => $pastry->id])}}">Modifica</a>
            <div class="d-inline-block">
                <form class="form-group d-inline-block" action="{{route("admin.pastries.destroy", ["pastry" => $pastry->id])}}" method="post">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-danger" type="submit" value="Elimina">
                </form>
            </div>
        </div>
    </div>

@endsection