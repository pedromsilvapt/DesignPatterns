<?php namespace Strategy\Practical\Weapon;

use Strategy\Practical\Entity;

class ValyrianSword implements Weapon {
	public function attack ( Entity $entity ) {
		$entity->takeAttack( 30 );
	}
}