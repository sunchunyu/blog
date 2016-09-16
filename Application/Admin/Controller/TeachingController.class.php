<?php
/**
 * Created by PhpStorm.
 * User: loner
 * Date: 2016/2/21
 * Time: 9:35
 */

namespace Admin\Controller;
use Think\Controller;

class TeachingController extends AdminController
{

	public function index(){

        !empty($_GET["nickname"])? $map["title"] = array("like","%".$_GET["nickname"]."%") : $map["title"]=array("like","%%");
		$list   = $this->lists('teach',$map);

        session("teach_list",$list);
        for($i=0; $i<count($list); $i++){
            $list[$i]["content"] = strip_tags($list[$i]["content"],"img");
            $list[$i]["content"] =  mb_strimwidth($list[$i]["content"], 0,80,"...","utf-8");
        }
		$this->assign('teach_list', $list);
		$this->display();
	}

	public function addTeach(){
		$accept = I("post.");
		if(IS_POST){
			$map["title"] = $accept["title"];
			$map["content"] = $accept["editor"];
			$res = M("teach")->data($map)->add();
			$this->ajaxReturn($res);
		}
		$this->display();
	}

    public function edit(){
        $id = $_GET["uid"];
        $list = session("teach_list");
        $info = [];
        for($i=0;$i<count($list); $i++){
            if($list[$i]["id"]==$id){
                $info = $list[$i];
            }
        }
        $this->assign("list",$info);
        $this->display();
    }

    public function addEdit(){
        $id=$_POST["seat"];
        $map["title"]=$_POST["title"];
        $map["content"]=$_POST["editor"];
        $res = M("teach")->data($map)->where("id=".$id)->save();
        $this->ajaxReturn($res);
    }

    public function changeStatus(){
        $id=$_GET["uid"];
        M("teach")->where("id=".$id)->delete();
    }

    public function showInfo(){
        $id = $_GET["uid"];
        $list = session("teach_list");
        $info = [];
        for($i=0;$i<count($list); $i++){
            if($list[$i]["id"]==$id){
                $info = $list[$i];
            }
        }
        $this->assign("list",$info);
        $this->display();
    }

}