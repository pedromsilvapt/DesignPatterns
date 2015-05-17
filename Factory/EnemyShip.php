<?php namespace Factory;

abstract class EnemyShip {
	/** @var  string */
	protected $name;
	/** @var  double */
	protected $damage;

	public function getName () {
		return $this->name;
	}

	public function setName ( $name ) {
		$this->name = $name;
	}

	public function getDamage () {
		return $this->damage;
	}

	public function setDamage ( $damage ) {
		$this->damage = $damage;
	}

	public function followHeroShip () {
		echo $this->getName() . ' is following the hero<br />';
	}

	public function displayEnemyShip () {
		echo $this->getName() . ' is on the screen<br />';
	}

	public function enemyShipShoots () {
		echo $this->getName() . ' attacks and does ' . $this->getDamage() . '<br />';
	}
}