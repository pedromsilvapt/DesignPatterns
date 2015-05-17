<?php namespace Strategy\Practical\Armor;

class IronArmor implements Armor {
	public function mitigate ( $damage ) {
		return $damage * 0.5;
	}
}