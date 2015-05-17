<?php namespace Factory;

class BigUFOEnemyShip extends UFOEnemyShip {
	function __construct () {
		$this->setName( 'Big UFO Enemy Ship' );
		$this->setDamage( 40 );
	}
}