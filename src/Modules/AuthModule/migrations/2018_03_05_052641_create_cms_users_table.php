<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

<<<<<<< HEAD:src/Modules/AuthModule/migrations/2018_03_05_052641_create_cms_users_table.php
class CreateCmsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50)->nullable();
			$table->string('photo')->nullable();
			$table->string('email', 50)->nullable();
			$table->string('password')->nullable();
			$table->integer('cms_roles_id')->nullable();
			$table->timestamps();
			$table->string('status', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms_users');
	}
=======
class AddTableCmsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('id_cms_privileges')->nullable();

            $table->timestamps();
        });
    }
>>>>>>> 5.4.0:src/database/migrations/2016_08_07_152421_add_table_cms_users.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_users');
    }
}
