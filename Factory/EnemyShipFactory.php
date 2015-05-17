<?php namespace factory;

class EnemyShipFactory {
	/**
	 * @param string $newShipType
	 *
	 * @return EnemyShip
	 */
	public function makeEnemyShip ( $newShipType ) {
		/** @var EnemyShip $newShip */
		$newShip = null;

		if ( $newShipType == 'U' ) {
			return new UFOEnemyShip();
		} else if ( $newShipType == 'R' ) {
			return new RocketEnemyShip();
		} else if ( $newShipType == 'B' ) {
			return new BigUFOEnemyShip();
		}

		return null;
	}
}