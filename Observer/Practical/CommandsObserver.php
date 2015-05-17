<?php namespace Observer\Practical;

class CommandsObserver implements Observer {

	/** @var Chat */
	protected $chat;

	function __construct ( Chat $chat ) {
		$this->chat = $chat;

		$this->chat->register( $this );
	}

	public function update ( $author, $message ) {
		if ( count( $message ) && $message[ 0 ] == '/' ) {
			$this->chat->send( 'SERVER', 'Comando desconhecido.' );
		}
	}
}