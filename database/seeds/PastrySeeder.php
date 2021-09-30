<?php

use Illuminate\Database\Seeder;
use App\Pastry;
use Illuminate\Support\Carbon;

class PastrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        foreach (config('pastry-today') as $pastry) {
            $new_pastry = new Pastry();
            $new_pastry->name = $pastry['name'];
            $new_pastry->ingredients = $pastry['ingredients'];
            $new_pastry->price = $pastry['price'];
            $new_pastry->discount_price = $pastry['discount_price'];
            $new_pastry->quantity = $pastry['quantity'];
            $new_pastry->img_path = str_replace(" ", "-", strtolower($new_pastry->name)) . ".jpg";
            $new_pastry->created_at = Carbon::today();
            $new_pastry->on_sale = $pastry['on_sale'];
            $new_pastry->save();
        }

        foreach (config('pastry-yesterday') as $pastry) {
            $new_pastry = new Pastry();
            $new_pastry->name = $pastry['name'];
            $new_pastry->ingredients = $pastry['ingredients'];
            $new_pastry->price = $pastry['price'];
            $new_pastry->discount_price = $pastry['discount_price'];
            $new_pastry->quantity = $pastry['quantity'];
            $new_pastry->img_path = str_replace(" ", "-", strtolower($new_pastry->name)) . ".jpg";
            $new_pastry->created_at = Carbon::yesterday();
            $new_pastry->on_sale = $pastry['on_sale'];
            $new_pastry->save();
        }

        foreach (config('pastry-twodaysago') as $pastry) {
            $new_pastry = new Pastry();
            $new_pastry->name = $pastry['name'];
            $new_pastry->ingredients = $pastry['ingredients'];
            $new_pastry->price = $pastry['price'];
            $new_pastry->discount_price = $pastry['discount_price'];
            $new_pastry->quantity = $pastry['quantity'];
            $new_pastry->img_path = str_replace(" ", "-", strtolower($new_pastry->name)) . ".jpg";
            $new_pastry->created_at = Carbon::today()->subDays(2);
            $new_pastry->on_sale = $pastry['on_sale'];
            $new_pastry->save();
        }

        foreach (config('pastry-threedaysago') as $pastry) {
            $new_pastry = new Pastry();
            $new_pastry->name = $pastry['name'];
            $new_pastry->ingredients = $pastry['ingredients'];
            $new_pastry->price = $pastry['price'];
            $new_pastry->discount_price = $pastry['discount_price'];
            $new_pastry->quantity = $pastry['quantity'];
            $new_pastry->img_path = str_replace(" ", "-", strtolower($new_pastry->name)) . ".jpg";
            $new_pastry->created_at = Carbon::today()->subDays(3);
            $new_pastry->on_sale = $pastry['on_sale'];
            $new_pastry->save();
        }
    }
}
