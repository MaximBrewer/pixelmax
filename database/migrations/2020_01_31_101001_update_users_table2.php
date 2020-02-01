<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mail', 255)->nullable();
            $table->string('telegram', 255)->nullable();
            $table->string('slack_address', 255)->nullable();
            $table->string('slack_name', 255)->nullable();
            $table->string('slack_token', 255)->nullable();
            $table->string('s3_address', 255)->nullable();
            $table->string('s3_access_key', 255)->nullable();
            $table->string('s3_access_secret', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mail');
            $table->dropColumn('telegram');
            $table->dropColumn('slack_address');
            $table->dropColumn('slack_name');
            $table->dropColumn('slack_token');
            $table->dropColumn('s3_address');
            $table->dropColumn('s3_access_key');
            $table->dropColumn('s3_access_secret');
        });
    }
}
