<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends AdminController{

	public function index(){

        empty($_GET["nickname"])? $map['account']=array('like','%'.$_GET["nickname"].'%') :  $map['account']="";
        $map["status"]=1;
		$list   = $this->lists('user',$map);

//		$nickname       =   I('token');
//		$map['status']  =   array('egt',0);
//		if(is_numeric($nickname)){
//			$map['uid|token']=   array(intval($nickname),array('like','%'.$nickname.'%'),'_multi'=>true);
//		}else{
//			$map['token']    =   array('like', '%'.(string)$nickname.'%');
//		}
//		$list   = $this->lists('user', $map);
//
//
		int_to_string($list);
        for($i=0; $i<count($list); $i++){
            $list[$i]["avatar"] = __ROOT__."/Uploads/".$list[$i]["avatar"];
        }
		$this->assign('_list', $list);
		$this->display();
	}

    //改变user现在状态
	public function changeStatus(){
        $map['token'] =    I('id');
        if(I('method')==1){         //同意此用户注册
            M("user")->data("status=1")->where($map)->save();
        }else if(I('method')==2){   //禁止此用户使用
            M("user")->where($map)->delete();
        }
	}

    //初始化管理用户
    public function manage(){
       $map["status"] = 0;
        $list   = $this->lists('user',$map);
        int_to_string($list);
        for($i=0; $i<count($list); $i++){
            $list[$i]["avatar"] = __ROOT__."/Uploads/".$list[$i]["avatar"];
        }
        $this->assign('_list', $list);
        $this->display();
    }


}
?>