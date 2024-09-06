<?php


// 普测
class PubtestAction extends Action
{
    public function index()
    {
        //echo U("Index/demo");

        $this->assign("title","普测题库搜索模块");
        //统计网站的访问量
        $webclicknum = M("Clicknum")->find(1);
        $webclicknum['clicknum']++;			//访问量加一
        $webclicknum['clicktime'] = time();
        M("Clicknum")->save($webclicknum);
        $this->assign('clicknum',$webclicknum['clicknum']);
        
        //各科题目数
        $subjectExamNum= array();
        $subjectExamNum[1]= M("testexam1")->count();
        $subjectExamNum[2]= M("testexam2")->count();
        $subjectExamNum[3]= M("testexam3")->count();
        $subjectExamNum[4]= M("testexam4")->count();
        $subjectExamNum[5]= M("testexam5")->count();
        $this->assign('examsNum',$subjectExamNum);
        

        $this->display();
    }    


	//ajax 查找题目
    public function search()
    {
        //echo $_POST['subject']."  ". $_POST['word']; die;
        //echo json_encode($_POST); die;
        
        //是否为练习模式搜题
        $istest= 0;
        if( !empty($_POST['isTest']) && is_int(intval($_POST['subject'])))
        {
        	//为搜练习题号
        	if(strlen($_POST['word']) < 6 && is_numeric($_POST['word']))
        		$istest= intval($_POST['isTest']);
        }

        //为搜内容
        if( is_int(intval($_POST['subject'])) && strlen($_POST['word']) > 0 )
        {
        	$tid= $_POST['subject'];
            $word=htmlspecialchars($_POST['word']);
            if($istest == 1)
            	$exams= M("testexam".$tid)->where("`sn` = {$word}")->select();
            else
            	$exams= M("testexam".$tid)->where("`content` like '%{$word}%'")->limit(10)->select();
            //echo json_encode($exams); die;
            $res= array();
            $res['data']= $exams;
            if($exams)
            	$res['code']= 200;
            else
            {
            	$res['code']= -1;
            	$res['data']= "未查找到题目 ！";
            }

            echo json_encode($res);
        }
        else
        {
            $this->error("查找题目失败...");
        }
    }
    
    
    
    
    //出测试题
    public function test()
    {
        $this->assign("title","普测出题模块");
        //统计网站的访问量
        $webclicknum = M("Clicknum")->find(1);
        $webclicknum['clicknum']++;			//访问量加一
        $webclicknum['clicktime'] = time();
        M("Clicknum")->save($webclicknum);
        $this->assign('clicknum',$webclicknum['clicknum']);
        
        //各科题目数
        $subjectExamNum= array();
        $subjectExamNum[1]= M("testexam1")->count();
        $subjectExamNum[2]= M("testexam2")->count();
        $subjectExamNum[3]= M("testexam3")->count();
        $subjectExamNum[4]= M("testexam4")->count();
        $subjectExamNum[5]= M("testexam5")->count();
        $this->assign('examsNum',$subjectExamNum);
        

        $this->display();
    }    

    
    
    
    
    
    
    
    
    
    
    
}