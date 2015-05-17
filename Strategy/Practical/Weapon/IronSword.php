<?php namespace Strategy\Practical\Weapon;

use Strategy\Practical\Entity;

class IronSword implements  Weapon {
	public function attack ( Entity $entity ) {
		$entity->takeAttack( 10 );
	}
}