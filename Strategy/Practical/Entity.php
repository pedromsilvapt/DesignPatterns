<?php namespace Strategy\Practical;

use Strategy\Practical\Armor\Armor;
use Strategy\Practical\Weapon\Weapon;

interface Entity {
	public function getName();
	public function getHealth();

	public function getArmor ();
	public function setArmor ( Armor $armor );

	public function getWeapon ();
	public function setWeapon ( Weapon $weapon );

	public function attack ( Entity $enemy );

	public function takeAttack ( $damage );
}