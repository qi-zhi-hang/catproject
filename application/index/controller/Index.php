<?php
namespace app\index\controller;

use lib\Tpredis;
use think\Controller;
use think\Db;
use think\Request;
header('Access-Control-Allow-Origin:*');
class Index extends Controller
{
    public function index()
    {


        halt($_POST);
        $order = [];
        $order['order_sn'] = date('YmdHis').rand(100,999);
        $order['created_time'] = time();
        $order['pay_time'] = 0;
        $order['status'] = 0;
        $result = Db::name('orders')->insert($order);
        if($result){
            $redis = Tpredis::getRedisInstance();
            $list = [$order['order_sn'],time()];
            $key = implode(':',$list);
            $res = $redis->setex($key,120,'redis延迟任务');
            halt($res);


        }
    }

    public function hello($name = 'ThinkPHP5')
    {

        return 'hello,' . $name;
    }

    public function test(Request $request)
    {
        $data = $request->post();
        halt($data);
    }

    public function upload()
    {

        //halt($_FILES);
        return 'http://tplinux.pabupa.wang/img.png';
    }
}
