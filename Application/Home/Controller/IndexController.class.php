<?php
namespace Home\Controller;
use Think\Controller;

/*
* 首页
*/
class IndexController extends BaseController {

    public function index(){
//        $_GET["bb"];
//        select * form article where ["title"]="$_GET["bb]";
        $article = M("article")->select();

        for($i=0;$i<count($article);$i++){
            $article[$i]["content"] = htmlentities( mb_substr( $article[$i]["content"], 0, 200,  "UTF-8"));
            $article[$i]["com_count"]=M("comment")->where('art_id='.  $article[$i]["id"])->count();
//            $article[$i]["mytitle"]=M("artitle")->where($article[$i]["title"] = $_GET["bb"]);

        }
        $this->assign("list", $article);
        $this->display();
    }

}