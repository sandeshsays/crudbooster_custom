<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

<<<<<<< HEAD:src/Modules/SettingModule/migrations/2018_03_05_052641_create_cms_settings_table.php
class CreateCmsSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50)->nullable();
			$table->text('content', 65535)->nullable();
			$table->string('content_input_type')->nullable();
			$table->string('dataenum')->nullable();
			$table->string('helper')->nullable();
			$table->timestamps();
			$table->string('group_setting', 50)->nullable();
			$table->string('label', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms_settings');
	}
=======
class AddTableCmsSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->string('content_input_type')->nullable();
            $table->string('dataenum')->nullable();
            $table->string('helper')->nullable();

            $table->timestamps();
        });
    }
>>>>>>> 5.4.0:src/database/migrations/2016_08_07_152320_add_table_cms_settings.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_settings');
    }
}
