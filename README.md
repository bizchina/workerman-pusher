# Workerman-Pusher

## What is it
A simple message pusher written based on workerman, which can simulate WEB background one-way push business notification to clients asynchronously.

## 它是什么
workerman-pusher 是基于workerman开发的一个异步消息推送器: 它能够模拟WEB后台单向异步推送业务通知。

## Animation
![demo](https://github.com/blogdaren/workerman-pusher/blob/master/media/demo.gif)

## Prerequisites
* \>= PHP 5.3
* A POSIX compatible operating system (Linux, OSX, BSD)  
* POSIX extensions for PHP  
* PCNTL extensions for PHP  

## Configuration

```php
return array(
    //调试
    'debug' => true,

    //默认测试域名: 记得配置 /etc/hosts !!!
    'domain' => 'www.pusher.com',

    //模拟uid(也可以是订单id | 也可以是任务id | ....)
    'uids' => array('1', '2', '3', '4', '5', '6'),

    //超时: 秒
    'timeout' => array(
        'reconnect' => 2,
    ),

    //间隔: 秒
    'interval' => array(
        //页面弹窗通知间隔时间
        'notice' => 3,
        //客户端发送心跳间隔时间
        'client_heart' => 1,
    ),

    //socket
    'socket' => array(
        //监听服务
        'listen' => array(
            'web'       => 'http://0.0.0.0:7777',
            'pusher'    => 'websocket://0.0.0.0:3000',
            'inner'     => 'text://0.0.0.0:4000',
        ),
        //连接哪个内部推送地址
        'connect' => array(
            'inner'  => 'text://192.168.1.100:4000',
        ),
    ),
    //ping - heartbeat - 秒
    'ping' => array(
        'interval' => 10,
        'data'     => '',
        'is_force_client_to_ping_server'    => true,
    ),
);
```

## Usage

First of all, let suppose your Server IP is: ```192.168.1.100```

* step-1、append one line below to /etc/hosts:

```192.168.1.100 www.pusher.com```

* step-2、start workerman-pusher sever:

```/path/to/php /path/to/start.php start```

* step-3、you can start built-in client like this:

```/path/to/php /path/to/Applications/Pusher/start_client.php start```

* step-3、or you can write client in PHP by yourself like this:

mainly use function `stream_socket_client()`, `fread()` , `fwrite()` and so on

* step-3、or you can have a test by telnet:

```telnet 192.168.1.100 4000```


## Demostrate
![demo1](https://github.com/blogdaren/workerman-pusher/blob/master/media/demo-1.png)
----
![demo2](https://github.com/blogdaren/workerman-pusher/blob/master/media/demo-2.png)
----
![demo3](https://github.com/blogdaren/workerman-pusher/blob/master/media/demo-3.png)
----
![demo4](https://github.com/blogdaren/workerman-pusher/blob/master/media/demo-4.png)

## Documentation
To be supplemented ...... 

## Related links and thanks

* [http://www.blogdaren.com](http://www.blogdaren.com)
* [https://www.workerman.net](https://www.workerman.net)

## Join In QQ:
![qqgroup](https://github.com/blogdaren/workerman-pusher/blob/master/media/qqgroup.png)

