<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('slug')->nullable();
            $table->text('type')->nullable();
            $table->text('template')->nullable();
            $table->text('status')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('order')->nullable();
            $table->date('date_open')->nullable();
            $table->date('date_close')->nullable();
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
        Schema::dropIfExists('nodes');
    }
}
