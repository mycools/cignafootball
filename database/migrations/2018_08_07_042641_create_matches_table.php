<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMatchesTable.
 */
class CreateMatchesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function(Blueprint $table) {
            $table->increments('id');
			$table->string('match_name', 255);
			$table->text('match_description');
			$table->dateTime('bet_start');
			$table->dateTime('bet_end');
			$table->dateTime('match_time');
			$table->integer('team_a');
			$table->integer('team_b');
			$table->integer('score_a')->default(0);
			$table->integer('score_b')->default(0);
			$table->enum('match_result', ['team_a_win', 'team_b_win', 'draw', 'pending'])->default('pending');
			$table->integer('bet_total_count')->default(0);
			$table->integer('win_total_count')->default(0);
			$table->integer('lose_total_count')->default(0);
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
		Schema::drop('matches');
	}
}
