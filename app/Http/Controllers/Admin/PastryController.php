<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pastry;
use Illuminate\Support\Carbon;

class PastryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $pastries = Pastry::all();

        foreach ($pastries as $pastry) {

            if ($pastry->created_at == Carbon::yesterday()) {
                $pastry->discount_price = ($pastry->price * 0.8);
            } elseif ($pastry->created_at == Carbon::today()->subDays(2)) {
                $pastry->discount_price = ($pastry->price * 0.2);
            } elseif ($pastry->created_at <= Carbon::today()->subDays(3)) {
                $pastry->discount_price = 0;
                $pastry->on_sale = 0;
            }
            $pastry->update();
        }

        $data = [
            "pastries" => $pastries
        ];

        return view("admin.pastries.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pastries.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione
        $request->validate($this->getValidationRules());

        // prendiamo tutti i dati del form
        $form_data = $request->all();

        // istanziamo una nuova classe 
        $new_pastry = new Pastry();
        $new_pastry->fill($form_data);
        $new_pastry->discount_price = 0;
        $new_pastry->created_at = Carbon::today();
        $new_pastry->on_sale = 1;

        // salviamo
        $new_pastry->save();

        return redirect()->route("admin.pastries.show", ["pastry" => $new_pastry->id])->with("success", "Prodotto creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pastry = Pastry::findOrFail($id);

        $data = [
            "pastry" => $pastry
        ];

        return view("admin.pastries.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pastry = Pastry::findOrFail($id);

        $data = [
            "pastry" => $pastry
        ];

        return view("admin.pastries.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        // validazione
        $request->validate($this->getValidationRules());

        // prendiamo tutti i dati del form
        $form_data = $request->all();

        // tramite la query prendiamo il prodotto da modificare
        $pastry = Pastry::findOrFail($id);

        if(isset($form_data["on_sale"])) {
            $pastry->created_at = Carbon::today();
            $pastry->discount_price = 0;
            $pastry->on_sale = 1;
        }

        // salviamo le modifiche
        $pastry->update($form_data);

        return redirect()->route("admin.pastries.show", ["pastry" => $pastry->id])->with("success", "Prodotto salvato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // tramite la query prendiamo il prodotto da eliminare
        $pastry = Pastry::findOrFail($id);
        
        // lo eliminiamo
        $pastry->delete();

        return redirect()->route("admin.pastries.index")->with("success", "Prodotto eliminato correttamente");
    }

    private function getValidationRules() {
        return [
            "name" => "required|max:100",
            "ingredients" => "required|max:1000",
            "price" => "required|numeric",
            "quantity" => "required|int"
        ];
    }
}
