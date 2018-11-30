<?php

declare(strict_types=1);

/**
 *	Création de mon humain avec des hp et des dégats
 */
class Humain
{
	public $hp = 0;
	public $damage = 0;
	public $force = 1;

	private function weapons()
	{
		$x = (int) rand(1,5);

		switch ($x) {
			case 1:
				$weapon = (string) 'sword';
				$mutiple = (float) 2;
				break;
			
			case 2:
				$weapon = (string) 'gun';
				$mutiple = (float) 1.1;
				break;

			case 3:
				$weapon = (string) 'dague';
				$mutiple = (float) 1.75;
				break;

			case 4:
				$weapon = (string) 'hand';
				$mutiple = (float) 1;
				break;

			case 5:
				$weapon = (string) 'branch';
				$mutiple = (float) 0.5;
				break;
		}

		return $mutiple;
	}

	function __construct()
	{
		$this->hp = (float) rand(75,100);
		$this->damage = (float) rand(50,60);
		$this->force = $this->weapons();
	}
}

/**
 *  Création de mon zombie avec des hp et des dégats
 */
class Zombie
{
	public $hp = 0;
	public $damage = 0;
	public $force = 1;
	
	function __construct()
	{
		$this->hp = (float) rand(175,225);
		$this->damage = (float) rand(25,35);
		$this->force = (float) 1;
	}
}

/**
 *  fight humain vs zombie
 */
class fight
{
	private function calcul ($atk, $def)
	{
		$def->hp -= $atk->damage * $atk->force;

		echo get_class($def)." ".$def->hp."<br>";

		if ($def->hp <= 0) {
			echo get_class($def)." est mort";
			exit;
		}
	}
	
 	function fightHumVSZom($Humain, $Zombie)
	{
		print_r($Humain);
		echo "<br>";
		print_r($Zombie);
		echo "<br>";

		$players = [
			1 => $Zombie,
			2 => $Humain,
		];

		while ($Humain->hp > 0 && $Zombie->hp > 0) {

			$x = (int) rand(1,2);

			$atk = $players[$x];
			$def = $players[2 - $x + 1];

			$this->calcul($atk, $def);

			$x = $atk;
			$atk = $def;
			$def = $x;

			$this->calcul($atk, $def);
		}
	}
}

?>