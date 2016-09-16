<?php
namespace Home\Controller;
use Think\Controller;

/**
* 登录,注册
*/
class LoginController extends Controller {

    public function open(){
    	$this->assign('account_view',"登录/注册");
        $this->display();
    }

    public function register(){
    	$this->assign('account_view',"登录/注册");
        $this->display();
    }

    public function login(){
    	$map['account'] = $_POST['account'];
    	$password = $_POST['password'];
    	$login = M('user');
    	$data = $login->field('id,password')->where($map)->find();


		if ($data != null && $data != false) {
    		if ($data['password'] == $password) {
    			session('user_account',$map['account']);
    			session('user_id',$data['id']);
    			session('user_status',true);
    			echo "true";
    		} else {
    			echo "error";
    		}
    	} else {
    		echo "false";
    	}
    }

    public function logout()
    {
    	session('user_account',null);
    	session('user_id',null);
    	session('user_status',false);
    	$this->redirect("Login/open");
    }

    public function registerSubmit(){
    	$map['account'] = $_POST['account'];
    	$map['password'] = $_POST['pwd'];
    	$map['create_time'] = date('Y-m-d');
    	$register = M('user');
    	$data = $register->add($map);
    	if ($data == false) {
    		echo "false";
    	} else {
    		echo "true";
    	}
    }

    public function checkAccount()
    {
    	$map['account'] = $_POST['account'];
    	$login = M('user');
    	$data = $login->field('account')->where($map)->find();
    	if ($data == null || $data == false) {
    		echo "true";
    	} else {
    		echo "false";
    	}
    }
}