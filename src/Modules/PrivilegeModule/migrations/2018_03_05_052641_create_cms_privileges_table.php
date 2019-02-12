<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

<<<<<<< HEAD:src/Modules/PrivilegeModule/migrations/2018_03_05_052641_create_cms_privileges_table.php
class CreateCmsPrivilegesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50)->nullable();
			$table->boolean('is_superadmin')->nullable();
			$table->string('theme_color', 50)->nullable();
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
		Schema::drop('cms_roles');
	}
=======
class AddTableCmsPrivileges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_privileges', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->boolean('is_superadmin')->nullable();
            $table->string('theme_color')->nullable();

            $table->timestamps();
        });
    }
>>>>>>> 5.4.0:src/database/migrations/2016_08_07_152014_add_table_cms_privileges.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_privileges');
    }
}
