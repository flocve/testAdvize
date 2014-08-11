<?php

class PostsController extends BaseController {
	public function index(){
		$posts = Post::get();
		$this->layout->nest('content','posts.index',compact('posts'));
	}

	public function view($id){
		$posts=post::where('id',$id)->firstOrFail();
		$this->layout->nest('content','posts.view',compact('posts'));
	}

}
?> 