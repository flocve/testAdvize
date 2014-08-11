<?php

// pour /posts
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

		if($from){
			$posts=DB::table('posts')
				->where('date','>=','')
				->get();
		}

		if($to){
			$posts=DB::table('posts')
				->where('date','<=',$to)
				->get();
		}

		if($from AND $to){
			$posts=DB::table('posts')
				->where('date','>=',$from)
				->where('date','<=',$to)
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

	// Pour /posts/<id>
	public function view($id){
		$posts=post::where('id',$id)->firstOrFail();
		$this->layout->nest('content','posts.view',compact('posts'));
	}

	// Pour /updateVdms
	public function updateVdms(){
		//on vide la table Posts
-		DB::table('posts')->delete();

		/*----Récupération des VDMs----*/
		$nbVDMs =0;		// Nombre de Vdm
		for($i=0;$i<16;$i++){

			/*---on récupère le contenu de l'url de la page $i---*/
		    $url = 'http://m.viedemerde.fr/?page='.$i.'';	
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_USERAGENT, 'test de Flocve');
		    $resultat = curl_exec ($ch);
		    curl_close($ch);

			$page = new DOMDocument();
			@$page->loadHTML($resultat);
			/*---Pour chaque élement <li> de la page html---*/
			foreach($page->getElementsByTagName('li') as $li){
				if($nbVDMs<200){	// Si le nombre de vdm est < à 200
					if(strstr($li->getAttribute('id'),"fml")){	// si l'id de <li> contien "fml"

						$content = $li->getElementsByTagName('p')->item(0)->nodeValue;	// Contenu de la Vdm

			    		$dateAuthor = $li->getElementsByTagName('span')->item(0)->nodeValue;
			    		$dateFr = explode("/",substr($dateAuthor, 0, 10));
			    		$date = new DateTime($dateFr[2]."-".$dateFr[1]."-".$dateFr[0]);
			    		$date = $date->format('Y-m-d H:i:s');	// on convertie la date pour la bdd
			    	
			    		$author =  substr($dateAuthor, 10, 100);	// Auteur de la Vdm
			   	
				   		//Incertion de la VDM en base
						DB::table('posts')->insert(
						    array('author' => $author, 'content' => $content, 'date' => $date)
						);
			    		$nbVDMs++;	
			    	}
				}
			}
		}

		$posts = post::get();
		$this->layout->nest('content','posts.index',compact('posts'));
	}

}
?> 