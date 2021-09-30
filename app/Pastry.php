<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pastry extends Model
{
    protected $table = "pastries";

    protected $fillable = [
        "name",
        "ingredients",
        "price",
        "quantity"
    ];
}
