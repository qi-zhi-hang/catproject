<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 17/7/28
 * Time: 上午12:27
 */
namespace app\common\lib;
use app\api\model\User;
use app\common\lib\Aes;
use lib\Tpredis;
use think\facade\Cache;

/**
 * Iauth相关
 * Class IAuth
 */
header("Content-Type: text/html;charset=utf-8");
class IAuth {

    /**
     * 设置密码
     * @param string $data
     * @return string
     */
    public static  function setPassword($data) {
        return md5($data.config('app.password_pre_halt'));
    }

    /**
     * 生成每次请求的sign
     * @param array $data
     * @return string
     */
    public static function setSign($data = []) {
        // 1 按字段排序
        ksort($data);
        // 2拼接字符串数据  &
        $string = http_build_query($data);
        // 3通过aes来加密
        $string = (new Aes())->encrypt($string);

        return $string;
    }

    /**
     * 检查sign是否正常
     * @param array $data
     * @param $data
     * @return boolen
     */
    public static function checkSignPass($data) {
        if(isset($data['sign'])){
            $str = (new Aes())->decrypt($data['sign']);
            $str = json_decode($str,true);
            $str = http_build_query($str);
            if(empty($str)) {
                return false;
            }
            // diid=xx&app_type=3
            parse_str($str, $arr);
            if(!is_array($arr) || empty($arr['did'])
                || $arr['did'] != $data['did']
            ) {
                return false;
            }
            if(!config('app_debug')) {

                if ((time() - ceil($arr['time'] / 1000)) > config('myapp.app_sign_time')) {
                    return false;
                }
                //echo Cache::get($data['sign']);exit;
                // 唯一性判定
                if (Cache::get($data['sign'])) {

                    return false;
                }
            }
             return true;
        }else{
             return false;
        }
    }

    /**
     * 设置登录的token  - 唯一性的
     * @param string $phone
     * @return string
     */
    public  static function setAppLoginToken($phone = '') {
        $str = md5(uniqid(md5(microtime(true)), true));
        $str = sha1($str.$phone);
        return $str;
    }

    /**
     * 验证token是否正确
     * @param array $data
     * @return bool
     */
    public  static function  checkTokenPass($data=[])
    {
        if(empty($data['token'])){
            return false;
        }
        $redis = Tpredis::getRedisInstance();
        $isToken = $redis->get($data['token']);
        if(empty($isToken)){
            return false;
        }
        $token = (new Aes())->decrypt($data['token']);
        $id = explode('||',$token);
        //获取生成token的时间戳
        $overtime = $id[2];
        if(empty($overtime)){
            return false;
        }
        if( time() > ($overtime + 7*24*3600) ){
            return false;
        }
        //获取uid
        $uid = $id[1];
        if(empty($uid)){
            return false;
        }
        $info = (new User())->getUserInfoById($uid);
        if(empty($info)){
            return false;
        }
        return true;
    }

}