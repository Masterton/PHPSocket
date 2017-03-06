# workerman 的使用

## 一、在Windows操作系统下的使用
* 1.用compose加载
    *   `composer require workerman/workerman-for-win`
* 2.创建`start.php`（入口文件）

```php
<?php
/**
* run with command 
* php start.php start
*/
use Workerman\Worker;
// composer 的 autoload 文件
include __DIR__ . '/../vendor/autoload.php';
if(strpos(strtolower(PHP_OS), 'win') === 0)
{
    exit("start.php not support windows, please use start_for_win.bat\n");
}
// 标记是全局启动
define('GLOBAL_START', 1);
// 加载IO 和 Web
require_once __DIR__ . '/start_io.php';
//require_once __DIR__ . '/start_web.php';
// 运行所有服务
Worker::runAll();
```

* 3.在文件目录下创建一个`start.bat`文件，写入
    >       php start.php
    >       pause
* 4.点击运行即可（不要关闭控制台，关闭就退出了）
* 5.运行 index.html 就可以了
* 6.给当前用户推送消息
    *   `127.0.0.1:2021?type=publish&content=message&to=user_id`
* 7.给所有在线用户推送消息
    *   `127.0.0.1:2021?type=publish&content=message`


## 二、在linux操作系统下的使用
* 1.用compose加载
    *   `composer require workerman/phpsocket.io`
* 2.创建start.php（启动文件）（运行设置查看 `/socket/start_io.php` 文件）

```php
<?php
/**
* run with command 
* php start.php start
*/
use Workerman\Worker;
// composer 的 autoload 文件
include __DIR__ . '/../vendor/autoload.php';
if(strpos(strtolower(PHP_OS), 'win') === 0)
{
    exit("start.php not support windows, please use start_for_win.bat\n");
}
// 标记是全局启动
define('GLOBAL_START', 1);
// 加载IO 和 Web
require_once __DIR__ . '/start_io.php';
//require_once __DIR__ . '/start_web.php';
// 运行所有服务
Worker::runAll();
```

* 3.点击运行即可（不要关闭控制台，关闭就退出了）
    *   `php start.php start` (测试环境下启动运行)
    *   `php start.php start -d` (线上环境启动运行)
    *   `php start.php status` (查看运行情况)
    *   `phph start.php stop` (停止运行)
* 4.运行 index.html 就可以了
* 5.给当前用户推送消息
    *   `127.0.0.1:2021?type=publish&content=message&to=user_id`
* 6.给所有在线用户推送消息
    *   `127.0.0.1:2021?type=publish&content=message`