<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

<<<<<<< HEAD:src/Modules/NotificationsModule/migrations/2018_03_05_052641_create_cms_notifications_table.php
class CreateCmsNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cms_users_id')->nullable();
			$table->string('content')->nullable();
			$table->string('url')->nullable();
			$table->boolean('can_read')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms_notifications');
	}
=======
class AddTableCmsLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ipaddress', 50)->nullable();
            $table->string('useragent')->nullable();
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->integer('id_cms_users')->nullable();

            $table->timestamps();
        });
    }
>>>>>>> 5.4.0:src/database/migrations/2016_08_07_151210_add_table_cms_logs.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_logs');
    }
}
