<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('_sub_category_id')->constrained()->onDelete('cascade');
            $table->string('name','240');
            $table->decimal('price', 15, 2);
            $table->decimal('special_price', 15, 2)->nullable();
            $table->string('unit','70');
            $table->string('description','1970');
            $table->Integer('stock');
            $table->string('active','5');
            $table->Integer('sold_count')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
