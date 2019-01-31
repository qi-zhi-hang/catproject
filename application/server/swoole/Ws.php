<?php

class Ws
{

    private $ws = null;
    CONST HOST = '0.0.0.0';
    CONST PORT = 9503;
    public function __construct()
    {
        $this->ws = new swoole_websocket_server(self::HOST,self::PORT);
        $this->ws->set(
            [
                'task_worker_num'=>2
            ]
        );
       // $_POST['http_data'] = $this->ws;
        $this->ws->on('open',[$this,'onOpen']);
        $this->ws->on('message',[$this,'onMessage']);
        $this->ws->on('task',[$this,'onTask']);
        $this->ws->on('finish',[$this,'onFinish']);
        $this->ws->on('close',[$this,'onClose']);
        $this->ws->start();
    }

    public function onOpen($ws,$request)
    {

        var_dump( $request->fd );
    }

    public function onMessage($ws,$frame)
    {
        echo "sever get message : {$frame->data} \n";
        $data = [
            'task'=>1,
            'fd'=>$frame->fd
        ];
        $ws->task($data);
       /* swoole_timer_tick(1000,function() use($ws,$frame){
            $ws->push($frame->fd,rand(2,10000));
        });*/
        $ws->push($frame->fd,'server push message :'.$frame->data);
    }

    public function onTask($ws,$task_id,$src_worker_id,$data)
    {
        sleep(20);
        return '我已经结束任务';
    }
    public function onFinish($ws,$task_id,$data)
    {
        echo "finish end : {$data}\n";
    }
    public function onClose($ws,$fd)
    {
        echo "client:{$fd}\n";
    }

}

new Ws();