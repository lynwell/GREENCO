<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    		$this->display();
    }
    
    public function update(){
    	header("Content-Type: text/html;charset=utf-8");
    	$salers = M("salers");
    	$count = count(I('get.id'));
    	$checks =   split (",", I('get.check'));
    	for($i=0;$i<$count;$i++){
    		$data['name'] = $_GET['name'][$i];
    		$data['tel'] = $_GET['tel'][$i];
    		$data['status'] = $checks[$i];
    		$salers->where('id='.$_GET['id'][$i].'')->save($data);
    	}
    	$this->success('操作完成','./index',2);
    }
}
