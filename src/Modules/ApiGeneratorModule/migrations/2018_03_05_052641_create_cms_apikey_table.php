<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

<<<<<<< HEAD:src/Modules/ApiGeneratorModule/migrations/2018_03_05_052641_create_cms_apikey_table.php
class CreateCmsApikeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_apikey', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('secretkey')->nullable();
			$table->integer('hit')->nullable();
			$table->string('status', 25)->default('active');
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
		Schema::drop('cms_apikey');
	}
=======
class AddTableCmsDashboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_dashboard', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->integer('id_cms_privileges')->nullable();
            $table->longtext('content')->nullable();

            $table->timestamps();
        });
    }
>>>>>>> 5.4.0:src/database/migrations/2016_08_07_150834_add_table_cms_dashboard.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_dashboard');
    }
}
