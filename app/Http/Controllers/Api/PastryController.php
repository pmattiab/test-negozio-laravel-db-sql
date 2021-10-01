<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pastry;

class PastryController extends Controller
{
    public function index() {
        
        $pastries = Pastry::all()->where("on_sale", 1);

        $pastries_for_response = [];

        foreach ($pastries as $pastry) {

            $pastries_for_response[] = [
                "name" => $pastry->name,
                "price" => $pastry->price,
                "discount_price" => $pastry->discount_price,
                "img_path" => $pastry->img_path
            ];
        }

        $result = [
            "success" => true,
            "pastries" => $pastries_for_response,
        ];

        return response()->json($result);
    }

    public function backofficeIndex() {
        
        $pastries = Pastry::all();

        $result = [
            "success" => true,
            "pastries" => $pastries,
        ];

        return response()->json($result);
    }
}
