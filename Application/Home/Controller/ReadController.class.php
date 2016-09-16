<?php
namespace Home\Controller;

/**
* 相册
*/
class ReadController extends BaseController{

	public function read(){
		$article = M("article");// 实例化User对象
		$map['id'] = $_GET['id'];
		$commtent=M("commtent")->select();
//		$model=$Model->join('article.id = comment.art_id','RIGHT')->select();
// 把查询条件传入查询方法
		$aa = $article->where($map)->select();
		$this->assign("list",$aa);

		$messages = M('message');
		$map['root_id'] = array('EXP','IS NULL');
		// 多表查询
		// $data = $messages->join('left join user on user.id = msg.publish_u_id')->field('user.account,msg.*')->table(array('user' => 'user', 'message' => 'msg'))->where($map)->order('create_time desc')->page('1,10')->select();
		// page('1,10')是分页，待修改
		$data = $messages->where($map)->order('create_time desc')->page('1,10')->select();
		if ($data != false && $data != null) {
			$this->assign('data',$data);
		} else {
			$this->assign('data',null);
		}
		// 查询附评
		$result = array();
		for ($i=0; $i < count($data); $i++) {
			$value['root_id'] = $data[$i]['id'];
			$data2 = $messages->where($value)->order('create_time')->select();
			if ($data2 != false && $data2 != null) {
				array_push($result, $data2);
			} else {
				array_push($result, null);
			}
		}
		// 返回数据
		$this->assign('value',$result);
		$this->display();
	}
	public function publish_message()
	{
		$map['content'] = $_POST['message'];
		$map['publish_u_id'] = session('user_id');
		if ($_POST['reply_u_id'] == "") {
			$map['reply_u_id'] = null;
		} else {
			$map['reply_u_id'] = $_POST['reply_u_id'];
		}
		if ($_POST['root_id'] == "") {
			$map['root_id'] = null;
		} else {
			$map['root_id'] = $_POST['root_id'];
		}
		if (session('user_status') == true) {
			$message = M('message');
			$add_message = $message->add($map);
			if ($add_message == false) {
				echo "false";
			} else {
				echo "true";
			}
		} else {
			echo "logout";
		}

	}

}
?>