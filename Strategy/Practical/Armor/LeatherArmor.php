<?php namespace Strategy\Practical\Armor;

class LeatherArmor implements Armor {
	public function mitigate ( $damage ) {
		return $damage * 0.75;
	}
}