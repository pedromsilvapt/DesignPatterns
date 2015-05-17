<?php
namespace Observer\Practical;

class Chat implements Subject {
	/** @var Observer[] */
	protected $observers;

	function __construct () {
		$this->observers = array();
	}


	public function register ( Observer $observer ) {
		$this->observers[] = $observer;
	}

	public function unregister ( Observer $observer ) {
		$observerIndex = array_search( $observer, $this->observers );

		array_splice( $this->observers, $observerIndex, 1 );
	}

	public function notifyObservers ( $author, $message ) {
		foreach ( $this->observers as $observer ) {
			$observer->update( $author, $message );
		}
	}

	public function send ( $author, $message ) {
		echo '[' . $author . '] ' . $message . '<br />';

		$this->notifyObservers( $author, $message );
	}
}