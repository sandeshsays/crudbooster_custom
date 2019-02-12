<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

<<<<<<< HEAD:src/Modules/ModuleGenerator/migrations/2018_03_05_052641_create_cms_modules_table.php
class CreateCmsModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_modules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50)->nullable();
			$table->string('icon', 50)->nullable();
			$table->string('path', 50)->nullable();
			$table->string('table_name', 50)->nullable();
			$table->string('controller', 50)->nullable();
			$table->boolean('is_protected')->default(0);
			$table->boolean('is_active')->default(0);
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
		Schema::drop('cms_modules');
	}
=======
class AddTableCmsModuls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_moduls', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('path')->nullable();
            $table->string('table_name')->nullable();
            $table->string('controller')->nullable();
            $table->boolean('is_protected')->default(0);
            $table->boolean('is_active')->default(0);

            $table->timestamps();
        });
    }
>>>>>>> 5.4.0:src/database/migrations/2016_08_07_154624_add_table_cms_moduls.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_moduls');
    }
}
