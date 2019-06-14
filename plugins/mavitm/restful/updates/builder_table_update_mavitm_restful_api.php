<?php namespace Mavitm\Restful\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMavitmRestfulApi extends Migration
{
    public function up()
    {
        Schema::table('mavitm_restful_api', function($table)
        {
            //thanks Patrick Fritsch
            $table->mediumText('displayed_fields')->nullable()->unsigned(false)->default(null)->change();
            $table->mediumText('config_data')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('mavitm_restful_api', function($table)
        {
            $table->string('displayed_fields', 2000)->nullable()->unsigned(false)->default(null)->change();
            $table->text('config_data')->unsigned(false)->default(null)->change();
        });
    }
}
