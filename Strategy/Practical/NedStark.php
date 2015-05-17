<?php namespace Strategy\Practical;

use Strategy\Practical\Armor\Armor;
use Strategy\Practical\Armor\IronArmor;
use Strategy\Practical\Weapon\IronSword;
use Strategy\Practical\Weapon\ValyrianSword;
use Strategy\Practical\Weapon\Weapon;

class NedStark extends Soldier {
	function __construct ( Weapon $weapon = null, Armor $armor = null ) {
		parent::__construct( 'Ned Stark', $weapon, $armor );
	}
}