<?php namespace Strategy\Practical\Weapon;

use Strategy\Practical\Entity;

interface Weapon {
	public function attack ( Entity $entity );
}