<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRanksTable.
 */
class CreateRanksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ranks', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedInteger('predict_count')->default(0);
			$table->unsignedInteger('win_count')->default(0);
			$table->unsignedInteger('lose_count')->default(0);
			$table->unsignedInteger('invitee_count')->default(0);
			$table->unsignedInteger('point')->default(0);
			$table->unsignedInteger('ranking_no')->default(0);
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
		Schema::drop('ranks');
	}
}
