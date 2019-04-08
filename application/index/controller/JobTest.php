<?php
/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2019/3/3
 * Time: 11:03
 */

namespace app\index\controller;


use think\Controller;
use think\Queue;

class JobTest extends Controller
{

    public function testQueue()
    {
        $jobHandlerClassName  = 'app\index\job\Hello';
        $jobQueueName  	  = "helloJobQueue";
        $jobData       	  = [ 'ts' => time(), 'bizId' => uniqid() , 'a' => 1 ];
        $isPush = Queue::push($jobHandlerClassName,$jobData,$jobQueueName);
        if($isPush){
            halt('success');
        }else{
            halt('error');
        }

    }

}