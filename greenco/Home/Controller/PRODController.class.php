<?php
namespace Home\Controller;
use Think\Controller;
class PRODController extends Controller {
	private  $dsc;
	private $blowerName;
    public function index(){
        $this->display();
    }
    public function getProd(){
    	$model	=trim(I('get.model'));
    	$type	=trim(I('get.type'));
    	$stage	= I('get.stage');
    	$prod	= M("pandect");
    	$blower= "";
    	$dsc     = "";
    	$list = $prod->where("model like '".$model."%' and blower_type='".$type."' and stage='".$stage."' ")->order('id ASC')->select();
    	if($stage =="Single"){
    		$stage = L('PROD_SINGLE_STAGE');
    	}elseif($stage =="Double"){
    		$stage = L('PROD_DOUBLE_STAGE');
    	}else{
    		$stage = L('PROD_THREE_STAGE');
    	}
    	$this->getBlowerName($model,$type);
    	$this->assign('blowerName',$this->blowerName);
    	$this->assign('list',$list);
    	$this->assign('model',$model);
    	$this->assign('type',$type);
    	$this->assign('dsc',$this->dsc);
    	$this->assign('stage',$stage);
    	$this->display();
    }
    public function getList(){
    	$model	=trim(I('get.model'));
    	$pdf	=trim(I('get.pdf'));
    	$type	=trim(I('get.type'));
    	$series	=trim(I('get.series'));
    	$prod = M("product");
    	$list = $prod->where("type like '".$model." {$_GET['series']}%' and blower_type='".$type."' ")->order('id ASC')->select();
    	$this->getBlowerName($model,$type);
    	$this->assign('blowerName',$this->blowerName);
    	$this->assign('series',I('get.series'));
    	$this->assign('pdf',$pdf);
    	$this->assign('list',$list);
    	$this->assign('model',$model);
    	$this->display();
    }    
    public function Search(){
    	$prod = M("product");
    	$airFlow = I('get.airFlow');
    	$pressure = I('get.pressure');
    	$type = I('get.type');
		if($type=="maximum_vacuum"){
			$pressure = -$pressure;
		}    	
    	if(empty($airFlow) && empty($pressure)){
    		E('请添加搜索条件');
    		return false;
    	}elseif (empty($airFlow) && !empty($pressure)){
    		$sql =$type."=".$pressure." ";
    	}elseif (!empty($airFlow) && empty($pressure)){
    		$sql ="maximum_airflow=".$airFlow." " ; 
    	}else{
    		$sql ="maximum_airflow"."=".$airFlow." and ".$type."=".$pressure." " ;
    	}
    	$list = $prod->where($sql)->select();
    	$this->assign('series',I('get.series'));
    	$this->assign('list',$list);
    	$this->display();
    }    
    
    public function Content(){
    	$prod = M("product");
    	$list = $prod->where("type like '%{$_GET['series']}%' and output={$_GET['output']}")->find();
    	$this->assign('series',I('get.series'));
    	$list["subtype"] = substr($list["type"],0,7);
    	if($list["subtype"] =="3RB 350" || $list["subtype"] =="3RB 550" || $list["subtype"] =="3RB 750"){
    		$list["subtype"] = substr($list["type"],0,9);
    	}
    	$this->assign('list',$list);
    	$this->display();
    }
    public function BContent(){
    	$prod = M("b_series");
    	$list = $prod->where("type like '%{$_GET['series']}%' and output={$_GET['output']}")->find();
    	$this->assign('series',I('get.series'));
    	$list["subtype"] = substr($list["type"],0,7);
    	if($list["subtype"] =="3RB 350"){
    		$list["subtype"] = substr($list["type"],0,9);
    	}
    	$this->assign('list',$list);
    	$this->display();
    }
    public function getSuctionList(){
    	//product  type like '%2RB {$_GET['series']}%'
    	//$list = S('contact-data');
    	//if (!$list) {
    	$prod = M("b_series");
    	$list = $prod->where("type like '%2RB {$_GET['series']}%'")->order('id ASC')->select();
    	//S('contact-data', $list, 7000);
    	//}
    	$this->assign('list',$list);
    	$this->assign('series',I('get.series'));
    	$this->display();
    }    
    public function getSilencerContent(){
    	//product  type like '%2RB {$_GET['series']}%'
    	//$list = S('contact-data');
    	//if (!$list) {
    	$prod = M("Silencer");
    	$list = $prod->where("type like '%{$_GET['type']}%'")->find();
//     	S('contact-data', $list, 7000);
    	//}
//     	echo $_GET['type'];
    	$this->assign('list',$list);
    	$this->display();
    }    
    public function filterContent(){
    	//product  type like '%2RB {$_GET['series']}%'
    	//$list = S('contact-data');
    	//if (!$list) {
    	$prod = M("filters");
    	$list = $prod->where("type like '%{$_GET['type']}%'")->find();
    	//S('contact-data', $list, 7000);
    	//}
    	$this->assign('list',$list);
    	$this->assign('type',I('get.type'));
    	$this->display();
    }   
    public function reliefContent(){
    	//product  type like '%2RB {$_GET['series']}%'
    	//$list = S('contact-data');
    	//if (!$list) {
    	$prod = M("Relief");
    	$list = $prod->where("type like '%{$_GET['type']}%'")->find();
    	//S('contact-data', $list, 7000);
    	//}
    	$this->assign('list',$list);
    	$this->assign('type',I('get.type'));
    	$this->assign('subType',substr(I('get.type'),0,2));
    	$this->display();
    }    
    private  function getBlowerName($model,$type){
    	$this->dsc = "";
    	$this->blowerName ="";
    	switch($model){
    		case "2RB" :
    			$type == "ie2"?$this->blowerName =L('IE2_2RB_REGENERATIVE_BLOWER'):$this->blowerName =L('2RB_SIDE_CHANNEL_BLOWER');
    			break;
    		case  "3RB" :
    			$this->blowerName =L('3RB_SIDE_CHANNEL_BLOWER');
    			$this->dsc = L('3RB_DSC');
    			break;
    		case  "4RB" :
    			$this->blowerName =L('4RB_SIDE_CHANNEL_BLOWER');
    			break;
    		case  "Belt" :
    			$this->blowerName =L('Belt_2RB_REGENERATIVE_BLOWER');
    			break;
    		case "IE2" :
    			$this->blowerName = L('IE2_2RB_REGENERATIVE_BLOWER');
    			break;
    		default:
    			$this->blowerName =L('COVER_SUCTION_RING_BLOWER');
    			break;
    	}
    }    
}