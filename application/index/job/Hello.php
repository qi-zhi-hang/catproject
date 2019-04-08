<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2019/3/3
 * Time: 11:09
 */
namespace app\index\job;
use think\Controller;
use think\Db;
use think\queue\Job;

class Hello extends Controller
{
    public function fire(Job $job,$data)
    {

        $isJobStillNeedToBeDone = $this->checkDatabaseToSeeIfJobNeedToBeDone($data);
        if(!$isJobStillNeedToBeDone){
            $job->delete();
            return;
        }

        $isJobDone = $this->doHelloJob($data);
        if($isJobDone){
            $job->delete();
        }else{
            if($job->attempts() > 3){
                print("<warn>Hello Job has been retried more than 3 times!"."</warn>\n");
                $job->delete();
            }
        }
    }

    private function checkDatabaseToSeeIfJobNeedToBeDone($data)
    {
        return true;
    }

    private function doHelloJob($data) {
        // 根据消息中的数据进行实际的业务处理...
        //Db::name('test')->add(['name'=>'99yy']);
        print("<info>Hello Job Started. job Data is: ".var_export($data,true)."</info> \n");
        print("<info>Hello Job is Fired at " . date('Y-m-d H:i:s') ."</info> \n");
        print("<info>Hello Job is Done!"."</info> \n");

        return true;
    }


}