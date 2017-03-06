<?php 

namespace App\Controllers;

use Workerman\Worker;
use PHPSocketIO\SocketIO;

/**
 * SocketController
 *
 */
class SocketController extends ControllerBase {

	public function connect($request, $response, $args) {
		$io = new SocketIO(3120);

		$io->on('connection', function($connection)use($io){
			echo "new connection coming\n";
		});
		
		Worker::runAll();
	}
}