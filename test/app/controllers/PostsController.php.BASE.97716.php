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
		echo "update";
		$posts = post::get();
		$this->layout->nest('content','posts.index',compact('posts'));
	}

}
?> 