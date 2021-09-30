@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="text-center mt-4 mb-5">
            <h1>Aggiungi nuovo prodotto</h1>
        </div>

        {{-- eventuali errori --}}
        @include("partials.validation-errors")

        <div>
            <form action="{{route("admin.pastries.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")
                    <div class="form-group">
                        <label for="name">Nome prodotto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" required>
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredienti</label>
                        <textarea class="form-control" rows="3" id="ingredients" name="ingredients" required>{{old("ingredients")}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantità</label>
                        <input type="number" step="1" class="form-control d-inline-block ml-2 mr-2" id="quantity" name="quantity" placeholder="0" style="width: 70px;" value="{{old("quantity")}}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Prezzo</label>
                        <input type="number" step="0.10" class="form-control d-inline-block ml-2 mr-2" id="price" name="price" placeholder="00.00" style="width: 100px;" value="{{old("price")}}" required>
                        <label class="d-inline-block ml-1">€</label>
                    </div>
                        
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Salva</button>
                        <a href="{{route("admin.pastries.create")}}" class="btn btn-outline-secondary">Svuota campi</a>
                    </div>
            </form>
        </div>

    </div>

@endsection