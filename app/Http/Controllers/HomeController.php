<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pastry;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        
        $pastries = Pastry::all()->where("on_sale", 1);

        foreach ($pastries as $pastry) {

            if ($pastry->created_at == Carbon::yesterday()) {
                $pastry->discount_price = ($pastry->price * 0.8);
            } elseif ($pastry->created_at == Carbon::today()->subDays(2)) {
                $pastry->discount_price = ($pastry->price * 0.2);
            }
            $pastry->update();
        }

        $data = [
            "pastries" => $pastries
        ];

        return view("guest.home", $data);
    }
}