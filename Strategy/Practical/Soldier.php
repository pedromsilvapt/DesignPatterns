<?php namespace Strategy\Practical;

use Strategy\Practical\Armor\Armor;
use Strategy\Practical\Weapon\Weapon;

class Soldier implements Entity {
	/** @var string */
	protected $name;
	/** @var int */
	protected $health;
	/** @var Armor */
	protected $armor;
	/** @var Weapon */
	protected $weapon;

	function __construct ( $name, Weapon $weapon = null, Armor $armor = null ) {
		$this->name = $name;
		$this->weapon = $weapon;
		$this->armor = $armor;

		$this->health = 50;
	}

	public function getName () {
		return $this->name;
	}

	public function setName ( $name ) {
		$this->name = $name;
	}

	public function getHealth () {
		return $this->health;
	}

	public function getArmor () {
		return $this->armor;
	}

	public function setArmor ( Armor $armor ) {
		$this->armor = $armor;
	}

	public function getWeapon () {
		return $this->weapon;
	}

	public function setWeapon ( Weapon $weapon ) {
		$this->weapon = $weapon;
	}

	public function attack ( Entity $enemy ) {
		return $this->getWeapon()->attack( $enemy );
	}

	public function takeAttack ( $damage ) {
		if ( $this->getArmor() ) {
			$damage = $this->getArmor()->mitigate( $damage );
		}

		$this->health -= $damage;

		if ( $this->health < 0 ) {
			$this->health = 0;
		}
	}
}