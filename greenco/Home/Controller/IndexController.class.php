<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//     	print  L('add_user_error');　
		//var_dump(I(get.lan));
		//echo $_GET['lan'];
        $this->display();
    }
    public function about_us(){
    	//     	print  L('add_user_error');　
    	$this->display();
    }
    public function download(){
    	//     	print  L('add_user_error');　
    	$this->display();
    }
    function check_verify($code, $id = ''){
    	$verify = new \Think\Verify();
    	return $verify->check($code, $id);
    }
    public function support(){
    	$list = S("support-data-".L('LAN'));
    	if (!$list) {
    		$news = M("news");
    		$list = $news->where("type ='support' and lan='". L('LAN')."'")->select();
	    	$count =  L('LAN')=="zh-cn"?100:250;
			for($i = 0; $i < count($list); ++$i) {
				$list[$i]['content'] = $this->_content($list[$i]['content'],$count);
			}		
		S("support-data-".L('LAN'), $list, 7000);
		}		
    	$this->assign('list',$list);
    	$this->display();
    }
    public function company(){
    	$list = S("company-data-".L('LAN'));
    	if (!$list) {
    		$news = M("news");
    		$list = $news->where("type ='company' and lan='". L('LAN')."'")->select();
    		$count =  L('LAN')=="zh-cn"?100:250;
    		for($i = 0; $i < count($list); ++$i) {
    			$list[$i]['content'] = $this->_content($list[$i]['content'],$count);
    		}
    		S("company-data-".L('LAN'), $list, 7000);
    	}
    	$this->assign('list',$list);
    	$this->display();
    }    
    public function industry(){
    	$list = S("industry-data-".L('LAN'));
    	if (!$list) {
    		$news = M("news");
    		$list = $news->where("type ='industry' and lan='". L('LAN')."'")->select();
    		$count =  L('LAN')=="zh-cn"?100:250;
    		for($i = 0; $i < count($list); ++$i) {
    			$list[$i]['content'] = $this->_content($list[$i]['content'],$count);
    		}
    		S("industry-data-".L('LAN'), $list, 7000);
    	}
    	$this->assign('list',$list);
    	$this->display();
    }
    public function news_content(){
//     	$list = S("industry-data-".L('LAN'));
//     	if (!$list) {/
    	   
    		$news = M("news");
    		$list = $news->where("id =". I('get.id'))->find();
//     		S("industry-data-".L('LAN'), $list, 7000);
//     	}
    	$this->assign('list',$list);
    	$this->display();
    }   
    public function application(){
    	//     	$list = S("industry-data-".L('LAN'));
    	//     	if (!$list) {/
    
//     	$news = M("news");
//     	$list = $news->where("id =". I('get.id'))->find();
    	//     		S("industry-data-".L('LAN'), $list, 7000);
    	//     	}
//     	$this->assign('list',$list);
    	$this->display();
    }
  private  function _content($_string,$_len) {
    	if (mb_strlen($_string,'utf-8') > $_len) {
    		$_string = mb_substr(strip_tags($_string),0,$_len,'utf-8');
    		return  $_string.'...';
    	}
    	return $_string;
    }            
}