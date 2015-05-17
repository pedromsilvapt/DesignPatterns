<?php namespace Factory;

class UFOEnemyShip extends EnemyShip {
	function __construct () {
		$this->setName( 'UFO Enemy Ship' );
		$this->setDamage( 20 );
	}
}