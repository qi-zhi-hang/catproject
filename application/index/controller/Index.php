<?php
namespace app\index\controller;

use lib\Tpredis;
use think\Controller;
use think\Db;
use think\db\Where;
use think\Exception;
use think\Request;
header('Access-Control-Allow-Origin:*');
class Index extends Controller
{
    public function index()
    {
        /*$res = $this->gtmynum(4);
        halt($res);
        $res = $this->arraySum(10);
        halt($res);
            $ar = $this->maopao();
            halt($ar);
            die;*/
            $dir = '/www/wwwroot/linuxtp5/tp5/';
            $result = opendir($dir);
            $arr = [$result,3];
            halt($arr);
            $this->findDir($dir);
            die;
            /*$sql = 'select * from tp_orders WHERE id >:id and created_time > :created_time';
        $res = Db::query($sql,['id'=>900,'created_time'=>1551004813]);*/
     /*   $sql = 'select * from tp_orders WHERE id >:id and created_time > :created_time';
        Db::listen(function ($sql,$time,$expline){
            echo $sql. ' ['.$time.'s]';
            dump($expline);
        });*/
       /* Db::transaction(function(){
            $res1 = Db::name('test')->where(['id'=>8])->setInc('age',2);
            $res2 = Db::name('test')->where(['id'=>10])->setDec('age',8);

        });*/
   /*     $sqls = [
            'update tp_test set age = 120 WHERE id = 3',
            'update tp_test set age = 240 WHERE  id = 1'
        ];
        Db::batchQuery($sqls);*/
        $res = Db::name('test')->aggregate('count','id');
        $data = ['id'=>4];
        $rule = [
            'type' => 'mod', // 分表方式
            'num'  => 5    // 分表数量
        ];
        $res = Db::name('log')->partition(['active_id'=>2],'active_id',$rule)->select();
        halt($res);
        $where = new Where();
        $where['id'] = ['gt',1000];
        $where['created_time']=['gt',1551004818];
        $res = Db::name('orders')->where($where)->select();
        halt($res);
        $order = [];
        $order['order_sn'] = date('YmdHis').rand(100,999);
        $order['created_time'] = time();
        $order['pay_time'] = 0;
        $order['status'] = 0;
        $result = Db::name('orders')->insert($order);
        if($result){
            $redis = Tpredis::getRedisInstance();
            $redis->selectdb(15);
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
        return 'http://tplinux.pabupa.wang/img.png';
    }
    private function findDir($dir)
    {
      if(!is_dir($dir))return false;

        $handle = opendir($dir);
        if($handle){
            while (($filename = readdir($handle)) !== false){
                $temp = iconv('GBK','utf-8',$dir.DIRECTORY_SEPARATOR.$filename);
                if($filename != '.' && $filename != '..' && is_dir($temp)){
                    echo '这是目录'.$temp."\r\n";
                    $this->findDir($temp);

                }else{
                    if($filename != '.' && $filename != '..'){
                        echo '这是文件'.$temp."\r\n";
                    }
                }
            }
        }
    }

    /**
     * 冒泡排序
     * @return array
     */
    private function maopao()
    {
        $maoarray = [1,2,6,10,3,7,9,100,87];
        $length = count($maoarray);
        $length = $length -1;
        $new_array = [];
        $temp = '';
        for($i=0;$i<=$length;$i++){
            for($j=$i+1;$j<=$length;$j++){
                if($maoarray[$i]>$maoarray[$j]){
                    $temp = $maoarray[$i];
                    $temp2 = $maoarray[$j];
                    $maoarray[$i] = $temp2;
                    $maoarray[$j] = $temp;
                }
            }
        }
        return $maoarray;
    }

    private function arraySum($n)
    {
        if($n<= 0)return false;
        if($n == 1) return 1;
        $sum = 0;
        for($i=1;$i<=$n;$i++){
            $sum += $i;

        }
        return $sum;
    }

    private function gtmynum($n){
        /*1,2,3,5,8,13*/
        if($n<= 0){
            return 0;
        }
        if($n == 1){
            return 1;
        }
        if($n == 2){
            return 2;
        }else{

            return $this->gtmynum($n-1) + $this->gtmynum($n-2);
        }

    }
}
