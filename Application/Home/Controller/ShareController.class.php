<?php 
namespace Home\Controller;

/**
* 资源分享
*/
class ShareController extends BaseController{
	
	public function share(){
		$article = M("article")->select();
		for($i=0;$i<count($article);$i++){
			$article[$i]["create_time"] = htmlentities( mb_substr( $article[$i]["create_time"], 0, 200,  "UTF-8"));
			$article[$i]["content"] = htmlentities( mb_substr( $article[$i]["content"], 0, 30,  "UTF-8"));
		}
		$this->assign("list", $article);
		$this->display();
	}

}
?>