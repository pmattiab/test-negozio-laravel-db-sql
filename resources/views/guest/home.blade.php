@extends('layouts.app')

@section('header-scripts')

    {{-- Axios cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Vue cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

@endsection

@section('footer-scripts')

    {{-- Script pastries.js --}}
    <script src="{{asset("js/pastries.js")}}"></script>

@endsection

@section('content')

    <div class="container">

        <div class="text-center mt-4 mb-5">
            <h1>Pasticceria</h1>
            <div class="pt-2">
                <h2>Vetrina Dolci</h2>
            </div>
        </div>

        {{-- card generate con vue js da api --}}
        <div id="root">
            <div class="row">
                <div v-for="pastry in pastries" class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="card mt-2 mb-4">
                        <img v-if="pastry.img_path" :src="'/storage/' + pastry.img_path" alt="@{{pastry.name}}" class="card-img-top">
                        <img v-else src="{{asset('storage/' . 'pasticceria.jpg')}}" alt="pasticceria" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">@{{pastry.name}}</h3>
                            <div class="mb-3">
                                <p>Prezzo
                                    <span v-if="pastry.discount_price"><del>€ @{{pastry.price.replace(".", ",")}}</del> € @{{pastry.discount_price.replace(".", ",")}}</span>
                                    <span v-else>€ @{{pastry.price.replace(".", ",")}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- card generate con php --}}
        {{-- <div class="row">
            @foreach ($pastries as $pastry)
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="card mt-2 mb-4">
                        @if ($pastry->img_path)
                            <img src="{{asset('storage/' . $pastry->img_path)}}" alt="{{$pastry->name}}" class="card-img-top">
                        @else
                            <img src="{{asset('storage/' . 'pasticceria.jpg')}}" alt="{{$pastry->name}}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">{{ucfirst($pastry->name)}}</h3>
                            <div class="mb-3">
                                <p>Prezzo
                                    @if ($pastry->discount_price)
                                        <span><del>€ {{str_replace(".", ",", number_format($pastry->price, 2))}}</del></span>
                                        <span>€ {{str_replace(".", ",", number_format($pastry->discount_price, 2))}}</span>
                                    @else
                                        <span>€ {{str_replace(".", ",", number_format($pastry->price, 2))}}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

    </div>

@endsection