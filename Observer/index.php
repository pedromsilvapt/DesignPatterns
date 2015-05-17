<?php
namespace Observer;

require '..\autoload.php';

class GrabStocks {
	public static function main () {
		/** @var StockGrabber $stockGrabber */
		$stockGrabber = new StockGrabber();

		/** @var StockObserver $observer1 */
		$observer1 = new StockObserver( $stockGrabber );

		$stockGrabber->setIBMPrice( 197.00 );
		$stockGrabber->setAAPLPrice( 677.60 );
		$stockGrabber->setGOOGPrice( 676.40 );

		$stockGrabber->unregister( $observer1 );

		/** @var StockObserver $observer2 */
		$observer2 = new StockObserver( $stockGrabber );

		$stockGrabber->setIBMPrice( 197.00 );
		$stockGrabber->setAAPLPrice( 677.60 );
		$stockGrabber->setGOOGPrice( 676.40 );
	}
}

GrabStocks::main();