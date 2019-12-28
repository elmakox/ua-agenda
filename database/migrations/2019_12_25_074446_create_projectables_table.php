<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectables', function (Blueprint $table) {
	        $table->integer("project_id");
	        $table->integer("projectable_id");
	        $table->string("projectable_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('projectables', function (Blueprint $table) {
	        Schema::dropIfExists('projectables');
        });
    }
}
