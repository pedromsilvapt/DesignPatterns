<?php namespace Observer\Practical;

require '..\..\autoload.php';

class Application {
	public static function main () {
		/** @var Chat $chat */
		$chat = new Chat();

		/** @var BotObserver $bot */
		$bot = new BotObserver( $chat );

		/** @var CommandsObserver $commands */
		$commands = new CommandsObserver( $chat );

		$chat->send( 'Pedro', 'Olá pessoal!' );
		$chat->send( 'Pedro', 'Que horas são?' );
		$chat->send( 'Pedro', 'Boa.' );
		$chat->send( 'Pedro', '/server start' );
	}
}

Application::main();