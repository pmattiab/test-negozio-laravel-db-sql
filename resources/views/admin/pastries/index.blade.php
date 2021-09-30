@extends('layouts.app')

@section('content')

    <div class="container">

        @include("partials.success-error-messages")

        <div class="text-center mt-4 mb-5">
            <h1>Lista prodotti</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>In vendita</h2>
            </div>
            @foreach ($pastries as $pastry)
                @if ($pastry->on_sale)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4 class="card-title">{{ucfirst($pastry->name)}}</h4>
                                <div class="mb-3">
                                    <span class="text-secondary">Messo in vendita il {{date("d/m/y", strtotime($pastry->created_at))}}</span>
                                </div>
                                <div class="mb-3">
                                    <span>Prezzo € {{str_replace(".", ",", number_format($pastry->price, 2))}}</span>
                                    @if ($pastry->discount_price)
                                        <span>- scontato € {{str_replace(".", ",", number_format($pastry->discount_price, 2))}}</span>
                                    @endif
                                </div>
                                <div>
                                    <a class="btn btn-primary" href="{{route("admin.pastries.show", ["pastry" => $pastry->id])}}">Dettagli</a>
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
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="col-12 mt-5">
                <h2>Non in vendita</h2>
            </div>
            @foreach ($pastries as $pastry)
                @if (!$pastry->on_sale)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4 class="card-title">{{ucfirst($pastry->name)}}</h4>
                                <div>
                                    <a class="btn btn-primary" href="{{route("admin.pastries.show", ["pastry" => $pastry->id])}}">Dettagli</a>
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
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>

@endsection