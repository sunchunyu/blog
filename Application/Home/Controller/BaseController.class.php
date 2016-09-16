<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {

	public function _initialize(){
		if(session("?user_status") == false || session("user_status") == false){
            $this->redirect("Login/open");
            $this->assign('account_view',"登录/注册");
        }
        $this->assign('account_view',session("user_account"));
	}

}