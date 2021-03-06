<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->integer('parent')->nullable()->default(0);
            $table->text('body')->nullable();
            $table->string('email')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
