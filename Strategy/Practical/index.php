<?php namespace Strategy\Practical;

use Strategy\Practical\Weapon\ValyrianSword;

require '..\..\autoload.php';

class Application {
	static $round = 0;

	public static function printPlayerHealth ( Entity $player ) {
		echo $player->getName() . ': ' . $player->getHealth() . '<br />';
	}

	public static function printHealth ( Entity $playerOne, Entity $playerTwo ) {
		static::printPlayerHealth( $playerOne );
		static::printPlayerHealth( $playerTwo );
	}

	public static function round ( Entity $playerOne, Entity $playerTwo ) {
		if ( $playerOne->getHealth() <= 0 || $playerTwo->getHealth() <= 0 ) {
			return;
		}

		$playerOne->attack( $playerTwo );
		$playerTwo->attack( $playerOne );

		echo 'Ronda '. ++static::$round . '<br />';
		static::printHealth( $playerOne, $playerTwo );
		echo '<br />';
	}

	public static function main () {
		$joffrey = new Joffrey( new Weapon\IronSword(), new Armor\IronArmor() );
		$eddard = new NedStark( new Weapon\IronSword(), new Armor\LeatherArmor() );

		static::round( $joffrey, $eddard );
		static::round( $joffrey, $eddard );
		static::round( $joffrey, $eddard );
		static::round( $joffrey, $eddard );

		echo 'Valyrian Sword!<br /><br />';
		$eddard->setWeapon( new ValyrianSword() );

		static::round( $joffrey, $eddard );
		static::round( $joffrey, $eddard );
	}
}

Application::main();