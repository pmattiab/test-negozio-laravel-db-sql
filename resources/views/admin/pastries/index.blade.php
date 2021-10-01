@extends('layouts.app')

@section('header-scripts')

    {{-- Axios cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Vue cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    {{-- Date js cdn --}}
    <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>

@endsection

@section('footer-scripts')

    {{-- Script pastries.js --}}
    <script src="{{asset("js/backoffice-pastries.js")}}"></script>

@endsection

@section('content')

    <div class="container">

        @include("partials.success-error-messages")

        <div class="text-center mt-4 mb-5">
            <h1>Lista prodotti</h1>
        </div>

        <div id="root">

            <div class="row">

                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th scope="col">In vendita</th>
                        <th scope="col">Prodotto</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Data vendita</th>
                        <th scope="col">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pastry in pastries" class="text-capitalize">
                            <td class="align-middle" style="font-size: 20px;">
                                <i v-if="pastry.on_sale" class="fas fa-check text-success"></i>
                                <i v-else class="fas fa-times text-danger"></i>
                            </td>
                            <td class="align-middle">@{{pastry.name}}</td>
                            <td class="align-middle">€ @{{pastry.price.replace(".", ",")}}</td>
                            <td class="align-middle">@{{dayjs(pastry.created_at).format('D/MM/YYYY')}}</td>
                            <td class="align-middle">
                                <a class="btn btn-primary" :href="'pastries/' + pastry.id">Dettagli</a>
                                <a class="btn btn-success" :href="'pastries/' + pastry.id + '/edit'">Modifica</a>
                                <form class="form-group d-inline-block" :action="'pastries/' + pastry.id" method="post" style="margin-bottom: 0;">
                                    @csrf
                                    @method("DELETE")
                                    <input class="btn btn-danger" type="submit" value="Elimina">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                        
            </div>

        </div>

    </div>

@endsection