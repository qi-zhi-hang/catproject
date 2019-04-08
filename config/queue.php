<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

return [
    //'connector' => 'Sync'
    'connector' =>'Redis',
    'expire'=>120,
    'default'=>'default',
    'host' =>'127.0.0.1',
    'port' =>'6379',
    'password'=>'qi123456',
    'select'=>1,
    'timeout'=>0,
    'persistent'=>false
];
