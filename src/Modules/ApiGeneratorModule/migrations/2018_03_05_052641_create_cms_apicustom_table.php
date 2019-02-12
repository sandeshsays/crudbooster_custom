<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

<<<<<<< HEAD:src/Modules/ApiGeneratorModule/migrations/2018_03_05_052641_create_cms_apicustom_table.php
class CreateCmsApicustomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_apicustom', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('permalink')->nullable();
			$table->string('tabel', 50)->nullable();
			$table->string('aksi')->nullable();
			$table->string('kolom', 50)->nullable();
			$table->string('orderby')->nullable();
			$table->string('sub_query_1')->nullable();
			$table->string('sql_where')->nullable();
			$table->string('name')->nullable();
			$table->string('keterangan')->nullable();
			$table->string('parameter')->nullable();
			$table->timestamps();
			$table->string('method_type', 25)->nullable();
			$table->text('parameters')->nullable();
			$table->text('responses')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms_apicustom');
	}
=======
class AddTableCmsApicustom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_apicustom', function (Blueprint $table) {
            $table->increments('id');

            $table->string('permalink')->nullable();
            $table->string('tabel')->nullable();
            $table->string('aksi')->nullable();
            $table->text('kolom')->nullable();
            $table->string('orderby')->nullable();
            $table->text('sub_query_1')->nullable();
            $table->text('sql_where')->nullable();
            $table->string('nama')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('parameter')->nullable();

            $table->timestamps();
        });
    }
>>>>>>> 5.4.0:src/database/migrations/2016_08_07_145904_add_table_cms_apicustom.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_apicustom');
    }
}
