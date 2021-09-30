@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="text-center mt-4 mb-5">
            <h1>Modifica prodotto</h1>
            <h2>{{ucfirst($pastry->name)}}</h2>
        </div>

        {{-- eventuali errori --}}
        @include("partials.validation-errors")

        <div>
            <form action="{{route("admin.pastries.update", ["pastry" => $pastry->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                    <div class="form-group">
                        <label for="name">Nome prodotto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$pastry->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredienti</label>
                        <textarea class="form-control" rows="3" id="ingredients" name="ingredients" required>{{$pastry->ingredients}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantità</label>
                        <input type="number" step="1" class="form-control d-inline-block ml-2 mr-2" id="quantity" name="quantity" placeholder="1" style="width: 70px;" value="{{$pastry->quantity}}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Prezzo</label>
                        <input type="number" step="0.10" class="form-control d-inline-block ml-2 mr-2" id="price" name="price" placeholder="00.00" style="width: 100px;" value="{{$pastry->price}}" required>
                        <label class="d-inline-block ml-1">€</label>
                    </div>
                    @if (!$pastry->on_sale)
                        <div class="custom-control custom-switch mb-3">
                            <input type="checkbox" class="custom-control-input" id="on_sale" name="on_sale">
                            <label class="custom-control-label" for="on_sale">Rimetti in vendita</label>
                        </div>
                    @endif
                        
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Salva</button>
                    </div>
            </form>
        </div>

    </div>

@endsection