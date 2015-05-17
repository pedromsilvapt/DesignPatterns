<?php
namespace Observer;

class StockObserver implements Observer {
	protected $ibmPrice;
	protected $aaplPrice;
	protected $googPrice;

	/** @var int int */
	private static $observerIDTracker = 0;

	/** int */
	private $observerID;

	/** @var  Subject */
	private $stockGrabber;

	function __construct ( Subject $stockGrabber ) {
		$this->stockGrabber = $stockGrabber;

		$this->observerID = ++static::$observerIDTracker;

		echo "New Observer" . $this->observerID . '<br />';

		$this->stockGrabber->register( $this );
	}


	public function update ( $ibmPrice, $aaplPrice, $googPrice ) {
		$this->ibmPrice = $ibmPrice;
		$this->aaplPrice = $aaplPrice;
		$this->googPrice = $googPrice;

		$this->printThePrices();
	}

	public function printThePrices () {
		echo '<br />' . $this->observerID . '<br />';
		echo 'IBM: ' . $this->ibmPrice. '<br />';
		echo 'AAPL: ' . $this->aaplPrice. '<br />';
		echo 'GOOG: ' . $this->googPrice. '<br />';
	}
}