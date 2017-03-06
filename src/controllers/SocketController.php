<?php 

namespace App\Controllers;

use Workerman\Worker;
use PHPSocketIO\SocketIO;

/**
 * SocketController
 *
 */
class SocketController extends ControllerBase {

	public function add($request, $response, $args) {

		$params = $request->getParams();
		//TODO 把数据线写入数据库在推送到前端用户页面
	}

	public function SimRequest($date) {

		//给指定用户发送消息
		if(!empty($data['to_id'])){
			$url = 'http://127.0.0.1:2121/?type=publish&content='.$data['title'].'&to='.$data['to_id'];
		}else {//给所有用户发送消息
			$url = 'http://127.0.0.1:2121/?type=publish&content='.$data['title'];
		}
		//$url = "http://192.168.1.228:2121/?type=publish&content=".$data['content']."&to=".$data['to_id'];

		//用curl模拟请求数据
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);    
		curl_exec($ch);  
		curl_close($ch);
	}
}