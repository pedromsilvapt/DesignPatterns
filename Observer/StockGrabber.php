<?php
namespace Observer;

class StockGrabber implements Subject {
	/** @var Observer[] $observers */
	protected $observers = array();
	protected $ibmPrice;
	protected $aaplPrice;
	protected $googPrice;

	function __construct () {

	}

	public function register ( Observer $newObserver ) {
		$this->observers[] = $newObserver;
	}

	public function unregister ( Observer $deleteObserver ) {
		$observerIndex = array_search( $deleteObserver, $this->observers );

		echo "Observer " . ( $observerIndex + 1 ) . ' deleted.<br />';

		array_splice( $this->observers, $observerIndex, 1 );
	}

	public function notifyObserver () {
		foreach ( $this->observers as $observer ) {
			$observer->update( $this->ibmPrice, $this->aaplPrice, $this->googPrice );
		}
	}

	public function setIBMPrice ( $newIBMPrice ) {
		$this->ibmPrice = $newIBMPrice;

		$this->notifyObserver();
	}

	public function setAAPLPrice ( $newAAPLPrice ) {
		$this->aaplPrice = $newAAPLPrice;

		$this->notifyObserver();
	}

	public function setGOOGPrice ( $newGOOGPrice ) {
		$this->googPrice = $newGOOGPrice;

		$this->notifyObserver();
	}
}
