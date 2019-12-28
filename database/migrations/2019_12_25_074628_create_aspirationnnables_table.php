<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirationnnablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirationnables', function (Blueprint $table) {
	        $table->integer("aspiration_id");
	        $table->integer("aspirationnable_id");
	        $table->string("aspirationnable_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('aspirationnables', function (Blueprint $table) {
	        Schema::dropIfExists('aspirationnables');
        });
    }
}
