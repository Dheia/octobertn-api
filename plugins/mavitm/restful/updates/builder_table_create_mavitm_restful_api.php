<?php namespace Mavitm\Restful\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMavitmRestfulApi extends Migration
{
    public function up()
    {
        Schema::create('mavitm_restful_api', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('primary_model')->nullable();
            $table->string('displayed_fields', 2000)->nullable();
            $table->text('config_data');
            $table->smallInteger('ispublic')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mavitm_restful_api');
    }
}
