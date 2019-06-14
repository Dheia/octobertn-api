<?php
/**
 * Created by PhpStorm.
 * User: ayhan
 * Date: 10.12.2017
 * Time: 22:49
 */

namespace Mavitm\Restful\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UserRestFulFields extends Migration
{
    public function up()
    {
        if (Schema::hasColumns('users', ['cilent_id', 'secret_key', 'daily_request_limit', 'allowed_ip'])) {
            return;
        }
        Schema::table('users', function($table)
        {
            $table->string('cilent_id', 250)->nullable();
            $table->string('secret_key', 250)->nullable();
            $table->integer('daily_request_limit')->nullable();
            $table->string('allowed_ip', 1000)->nullable();
            $table->index('cilent_id');
            $table->index('secret_key');
        });
    }
    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function ($table) {
                $table->dropColumn(['cilent_id', 'secret_key', 'daily_request_limit', 'allowed_ip']);
            });
        }
    }
}

