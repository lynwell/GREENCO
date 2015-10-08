<?php
namespace Home\Controller;
use Think\Controller;
import('.Org.Mail');
class ContactController extends Controller {
    public function index(){
        $this->display();
    }
    public function contact(){
    	$list = S('contact-data');
    	if (!$list) {
    		$salers = M("salers");
    		$list = $salers->where("status ='true'")->select();
    		S('contact-data', $list, 7000);
    	}
    	$this->assign('list',$list);
    	$this->display();
    }
    public function code(){
    	$Verify = new \Think\Verify();
    	$Verify->fontSize = 12;
    	$Verify->length   = 4;
    	$Verify->useNoise = false;
		$Verify->entry();
    }
    public function checkVerify($code, $id = ''){
    	$Verify = new \Think\Verify();
    	echo $Verify->check($code, $id);
    }
    public function sendEmail(){
    	$name = I('get.name');
    	$company = I('get.company');
    	$phone = I('get.phone');
    	$email = I('get.email');
    	$content = I('get.content');
    	$code = I('get.code');
    	$Verify = new \Think\Verify();
    	$flag =  $Verify->check($code, $id);
    	if($flag ==true){
			SendMail("greenco@greenco.cn",$company,"姓名:".$name."<br/>电话:".$phone."<br/>邮箱:".$email."<br/>留言:".$content);
    		echo "1";
    	}else{
    		echo "0";
    	}
    }
}