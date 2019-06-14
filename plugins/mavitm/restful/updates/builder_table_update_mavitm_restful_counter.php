<?php namespace Mavitm\Restful\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMavitmRestfulCounter extends Migration
{
    public function up()
    {
        Schema::table('mavitm_restful_counter', function($table)
        {
            $table->integer('content_id')->unsigned()->nullable();
            $table->string('content_type', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('mavitm_restful_counter', function($table)
        {
            $table->dropColumn('content_id');
            $table->dropColumn('content_type');
        });
    }
}
