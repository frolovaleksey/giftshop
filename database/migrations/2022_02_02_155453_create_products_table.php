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
            $table->bigIncrements('id');
            $table->text('slug')->nullable();
            $table->text('type')->nullable();
            $table->text('template')->nullable();
            $table->text('status')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('order')->nullable();
            $table->date('date_open')->nullable();
            $table->date('date_close')->nullable();
            $table->string('currency')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('partner_price')->nullable();
            $table->text('sku')->nullable();
            $table->boolean('in_stock')->nullable();
            $table->text('promotion')->nullable();
            $table->integer('buy_count')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('author_id')->nullable();
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
