<?php

/**
 * Created by PhpStorm.
 * User: @QZH
 * Date: 2019/1/30
 * Time: 18:17
 */
namespace app\api\base;
use app\common\lib\IAuth;
use think\Controller;
//header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:content-type,token,id,sign');
//header("Access-Control-Request-Headers: Origin, X-Requested-With, content-Type, Accept, Authorization");
class Base extends Controller
{
    public function __construct()
    {

        $headers = request()->header();
         IAuth::checkSignPass($headers);
        //$data = IAuth::setSign($headers);

    }
}