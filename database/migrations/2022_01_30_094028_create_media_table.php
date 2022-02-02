<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mediable_id');
            $table->string('mediable_type', 255);
            $table->string('filename', 255);
            $table->string('extension', 255);
            $table->text('url')->nullable();
            $table->text('title')->nullable();
            $table->text('alt')->nullable();
            $table->text('decs')->nullable();
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
        Schema::dropIfExists('media');
    }
}
