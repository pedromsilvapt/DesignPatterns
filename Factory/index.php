<?php namespace Factory;

require '..\autoload.php';

class Application {
	public static function doStuff ( EnemyShip $enemy ) {
		$enemy->displayEnemyShip();
		$enemy->followHeroShip();
		$enemy->enemyShipShoots();
	}

	public static function main () {
		$factory = new EnemyShipFactory();

		if ( !isset( $_GET[ 'ship' ] ) ) {
			$_GET[ 'ship' ] = '';
		}

		$theEnemy = $factory->makeEnemyShip( $_GET[ 'ship' ] );

		if ( $theEnemy ) {
			static::doStuff( $theEnemy );
		} else {
			echo 'Enter a U, R or B next time.';
		}
	}
}

Application::main();