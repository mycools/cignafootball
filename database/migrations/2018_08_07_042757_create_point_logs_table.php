<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePointLogsTable.
 */
class CreatePointLogsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('point_logs', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->char('point_type', 3)->comment('inv, bet');
			$table->unsignedBigInteger('user_id');
			$table->integer('point_score')->default(0);
			$table->morphs('taggable');
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
		Schema::drop('point_logs');
	}
}
