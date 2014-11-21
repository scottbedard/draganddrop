<?php namespace Bedard\DragDrop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateExamplesTable extends Migration
{

    public function up()
    {
        Schema::create('bedard_dragdrop_examples', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('position')->unsigned();
            $table->string('label')->nullable();
            $table->boolean('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bedard_dragdrop_examples');
    }

}
