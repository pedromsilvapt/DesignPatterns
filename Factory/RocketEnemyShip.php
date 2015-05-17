<?php namespace Factory;

class RocketEnemyShip extends EnemyShip {
	function __construct () {
		$this->setName( 'Rocket Enemy Ship' );
		$this->setDamage( 10 );
	}
}