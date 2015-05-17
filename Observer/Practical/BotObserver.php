<?php
namespace Observer\Practical;

use DateTime;

class BotObserver implements Observer {
	/** @var Chat */
	protected $chat;

	function __construct ( Chat $chat ) {
		$this->chat = $chat;

		$this->chat->register( $this );
	}

	public function update ( $author, $message ) {
		if ( strtolower( $message ) == 'que horas são?' ) {
			$now = new DateTime();

			$this->chat->send( 'BOT', 'São ' . $now->format( 'H:m' ) );
		}
	}
}