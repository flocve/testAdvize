<?php

class PostsController extends BaseController {
	public function index(){

		$posts = post::get();

		$from = Input::get('from');
		$to =  Input::get('to');
		$author = Input::get('author');


		if($author){
			$posts=DB::table('posts')
				->where('author',$author)
				->get();
		}

		if($to AND $author){
			$posts=DB::table('posts')
				->where('author',$author)
				->where('date','<=',$to)
				->get();
		}

		if($from AND $author){
			$posts=DB::table('posts')
				->where('author',$author)
				->where('date','>=',$from)
				->get();
		}

		if($from AND $to AND $author){
			$posts=DB::table('posts')
				->where('author',$author)
				->where('date','>=',$from)
				->where('date','<=',$to)
				->get();
		}

		$this->layout->nest('content','posts.index',compact('posts'));
	}

	public function view($id){
		$posts=post::where('id',$id)->firstOrFail();
		$this->layout->nest('content','posts.view',compact('posts'));
	}

	public function updateVdms(){
		//on vide la table Posts
-		DB::table('posts')->delete();

		// on recupere les Vdms
		$url="http://apps.fmylife.com/v8_android/src/?lang=fr";
		$xml=simplexml_load_file($url);
		foreach ($xml as $vdm) {
			$date = new DateTime(str_replace("-", "", $vdm->date));
			$date = $date->format('Y-m-d H:i:s');

			DB::table('posts')->insert(
			    array('author' => $vdm->author, 'content' => $vdm->text, 'date' => $date)
			);

		}
		$posts = post::get();
		$this->layout->nest('content','posts.index',compact('posts'));
	}

}
?> 