<?php

declare(strict_types=1);

namespace Game;

/**
 *  fight humain vs zombie
 */
final class Battle
{
    private $players = [];
    private $groupsOfLivingPlayers = [];

    public function __construct(Player ...$players)
    {
        $this->players = $players;
        foreach ($players as $player) {
            if (!isset($this->groupsOfLivingPlayers[get_class($player)])) {
                $this->groupsOfLivingPlayers[get_class($player)] = [];
            }
            $this->groupsOfLivingPlayers[get_class($player)][$player->identifier()] = $player;
        }
    }

    private function processing(Fighter $atk, Opponent $def)
    {
        try {
            $def->takeDamage($atk->damage() * $atk->force());
            echo get_class($def)." {$def->health()}<br>\n";
        } catch (CharacterIsDead $exception) {
            $dead = $exception->impactedMortalCharacter();
            unset($this->groupsOfLivingPlayers[get_class($dead)][$dead->identifier()]);
            echo $exception->getMessage();
        }
    }

    public function fight()
    {
        foreach ($this->players as $player) {
            print_r($player);
            echo "<br>\n";
        }

        $this->game(...$this->players);
    }

    private function game(Player ...$players): void
    {
        while ($this->groupsHaveAtLeastOneSurvivor()) {
            $this->round(...$players);
        }
    }

    private function round(Player ...$players)
    {
        $selectedFirstPlayer = (int)rand(0, count($players) - 1);

        $atk = $players[$selectedFirstPlayer];
        $def = $players[abs($selectedFirstPlayer - 1)];

        $this->processing($atk, $def);

        $tempPlayer = $atk;
        $atk = $def;
        $def = $tempPlayer;

        $this->processing($atk, $def);
    }

    private function groupsHaveAtLeastOneSurvivor(): bool
    {
        foreach ($this->groupsOfLivingPlayers as $group) {
            if (count($group) < 1) {
                return false;
            }
        }

        return true;
    }
}
