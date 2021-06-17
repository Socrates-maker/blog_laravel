<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedSuivisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('suivis',function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->integer('suiveur_id');
		    $table->integer('suivi_id');

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
	    Schema::dropIfExists('suivis');
    }
}
