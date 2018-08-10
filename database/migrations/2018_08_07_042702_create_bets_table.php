<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBetsTable.
 */
class CreateBetsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bets', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->integer('match_id');
			$table->integer('predicted_team')->comment('insert team_id and 0 for draw');
			$table->enum('bet', ['pending', 'win', 'lose'])->default('pending');
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
		Schema::drop('bets');
	}
}
