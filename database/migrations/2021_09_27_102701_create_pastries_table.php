<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("pastries", function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->text("ingredients");
            $table->float("price", 5, 2);
            $table->float("discount_price", 5, 2);
            $table->tinyInteger("quantity");
            $table->string("img_path", 255)->nullable();
            $table->timestamps();
            $table->boolean("on_sale");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastries');
    }
}
