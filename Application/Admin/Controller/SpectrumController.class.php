<?php
/**
 * Created by PhpStorm.
 * User: loner
 * Date: 2016/2/21
 * Time: 9:41
 */
namespace Admin\Controller;
use Think\Controller;

class SpectrumController extends AdminController{

    //谱库初始页
	public function index(){

		$list   = $this->lists('category');
		int_to_string($list);
        for($i=0;$i<count($list);$i++){
            $list[$i]["ca_cover_img"] =__ROOT__."/Uploads/".$list[$i]["ca_cover_img"];
        }
		$this->assign('_list', $list);
		$this->display();
	}

    //初始化乐谱类
	public  function music(){
        isset($_GET["nickname"])? $nickname=$_GET["nickname"] : $nickname="";
		$list = D("Spectrum")->music($nickname);
		$this->assign("_list",$list["music_list"]);
        $this->assign("_page",$list["page"]);
		$this->display();
	}

    public function del(){
        $id=$_GET["id"];
        $tableName = $_GET["table"];
        if($tableName=="category"){
            M($tableName)->where("ca_id=".$id)->delete();
        }else{
            M($tableName)->where("m_id=".$id)->delete();
        }
    }

    //添加乐谱
    public function addMusic(){
        if(IS_POST){
            $where["m_name"]=$_POST["music_name"];
            $ret_id = M("music")->field("m_name")->where($where)->find();
            if($ret_id){
                $div = "<div id='error'>此乐谱名已存在</div>";
                $this->assign("error",$div);
            } else{
                $upload = new \Think\Upload();// 实例化上传类
                $upload->saveName = array('uniqid','');
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
                $upload->savePath  =     'template/'; // 设置附件上传（子）目录
                $info   =   $upload->upload();      // 上传文件
                $data["m_type"] = $_POST["type_select"];
                $data["m_name"] = $_POST["music_name"];
                $data["m_avatar"] = $info["upfile"]["savepath"].$info["upfile"]["savename"];
                $data["m_author"] = $_POST["author"];
                $data["m_uploader"] = session("detail");
                $data["m_player"] = $_POST["performer"];
                $data["m_intro"] = $_POST["introduct"];
                $data["m_md5"] = $info["upfile"]["md5"];
                $data["m_score"] = $_POST["news_content"];
                $data["create_time"] = time();
                $res = M("music")->data($data)->add();
                if($res==0){
                    $div = "<div id='error'>添加失败</div>";
                    $this->assign("error",$div);
                }else{
                    redirect(U('Admin/Spectrum/music'));
                }
            }
        }
        $list_type =M("category")->select();
        $this->assign("list_type",$list_type);
        $this->display();
    }

    public function m_showInfo(){
        $list = D("Spectrum")->show_music();
        $this->assign("list",$list);
        $this->display();
    }

    //谱库/乐谱编辑
    public function music_edit(){
        if($_POST){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->saveName = array('uniqid','');
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'template/'; // 设置附件上传（子）目录
            $info   =   $upload->upload();      // 上传文件
            $photo = M("music")->field("m_md5")->where("m_id=".$_POST["choice"])->find();
            if($photo["m_md5"]==$info["upfile"]["md5"]){
                $src =  ROOT_PATH ."/Uploads/".$info["upfile"]["savepath"].$info["upfile"]["savename"];
                $src = str_replace("\\","/",$src);
                unlink($src);           //删除指定文件
            }
            $detail["m_type"] = $_POST["type_select"];
            $detail["m_name"] = $_POST["music_name"];
            $detail["m_avatar"] = $info["upfile"]["savepath"].$info["upfile"]["savename"];
            $detail["m_author"] = $_POST["author"];
            $detail["m_uploader"] = session("detail");
            $detail["m_player"] = $_POST["performer"];
            $detail["m_intro"] = $_POST["introduct"];
            $detail["m_md5"] = $info["upfile"]["md5"];
            $detail["m_score"] = $_POST["news_content"];
            $save_result = M("music")->data($detail)->where("m_id=".$_POST["choice"])->save();
            if($save_result){
                redirect(U('Admin/Spectrum/music'));
            }
        }
        $list_type =M("category")->select();
        $music = D("Spectrum")->show_music();
        $this->assign("list_type",$list_type);
        $this->assign("music_info",$music);
        $this->display();
    }

    public function addMusicType(){
        if($_POST){

            $upload = new \Think\Upload();// 实例化上传类
            $upload->saveName = array('uniqid','');
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'cover/'; // 设置附件上传（子）目录
            $info   =   $upload->upload();      // 上传文件

            $data["ca_type"] = I("music_name");
            $data["ca_cover_img"] = $info["upfile"]["savepath"].$info["upfile"]["savename"];;
            $res = M("category")->data($data)->add();
            if($res){
                redirect(U('Admin/Spectrum/index'));
            }
        }else{
            $this->display();
        }
    }
}
?>