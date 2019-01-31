<?php
/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2018/12/24
 * Time: 20:02
 */

namespace app\admin\controller;


use app\admin\model\Adminuser;
use lib\Tpredis;
use think\Controller;
use think\facade\Session;
use think\Request;


class Login extends Controller
{
    /**
     * 登陆页面
     * @return mixed
     */
    public function login(Request $request)
    {
        if($this->request->isPost()){
            $postdata = $request->post();
            if(empty($postdata['username']) || empty($postdata['password']) || empty($postdata['captcha'])){
                $this->error('所填数据不完整，请核验后再提交');
            }
            if(!captcha_check($postdata['captcha'])){
                $this->error('验证码错误');
            }
            $info = Adminuser::get(['adminname'=>$postdata['username'],'password'=>md5($postdata['password'])]);
            if(empty($info)){
                $this->error('账号密码错误');
            }
            $sessionid = Session::getsessionid();
            if($sessionid != $info['session_id']){
                $redis = Tpredis::getRedisInstance();
                $redis->delete($info['session_id']);
            }
            //登陆成功
            Session::set('admininfo',json_encode($info));
            Adminuser::update(['session_id'=>$sessionid],['id'=>$info['id']]);
            $this->success('恭喜您，登陆成功',url('Index/index'));
        }else{

            return $this->fetch();
        }
    }
}