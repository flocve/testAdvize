<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table){
			$table->increments('id');
			$table->text('content');
			$table->string('author');
			$table-> dateTime('date');
			$table->timestamps();
		});

		for($i=0;$i<200;$i++){
			Post::create([
			'content' => "Aujourd'hui, iAdvize m'a demandé de réaliser un test de développeur PHP",
			'author' => "Genius-$i",
			'date' => date("Y-m-d H:i:s")
			]);
		}

		
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
