<?php
/**
 * Created by PhpStorm.
 * User: shiri
 * Date: 16/12/18
 * Time: 22:24
 */

declare(strict_types=1);

namespace App\Service;

use App\Entity\Player;
use App\Exception\TooManyPlayers;
use App\Exception\EnoughParticipants;
use App\Game as GameInterface;
use Support\Renderer\Output;
use App\Entity\Participant;
use Support\Service\RandomValue;

final class Game implements GameInterface
{
    private $output;
    private $randomValueGenerator;
    private $participants;
    private $board;
    public function __construct(Output $output, RandomValue $randomValueGenerator, Participant ...$participants)
    {
        $this->validateTooManyParticipants($participants);
        $this->validateEnoughParticipants($participants);
        $this->output = $output;
        $this->randomValueGenerator = $randomValueGenerator;
        $this->participants = $participants;
    }
    public function run(): Output
    {
        $this->output->writeLine(sprintf(
                'Initialisation du jeu avec %d participants.',
                count($this->participants))
        );
        $this->output->writeLine('Initialisation de la grille en 7 colonnes et 6 lignes.');
        $this->initBoard();
        return $this->output;
    }
    private function validateTooManyParticipants(array $participants): void
    {
        if ( (count($participants) % 2) != 0 ) {
            //rajouter la suppression du dernier joueur en trop
            throw new TooManyPlayers();
        }
    }
    private function validateEnoughParticipants(array $participants): void
    {
        if (count($participants) < 2) {
            throw new EnoughParticipants;
        }
    }
    private function initBoard()
    {
        $this->board = [];
        $this->output->writeLine(str_pad('', 65, '-'));
        for ($row = 5; $row >= 0; --$row) {
            $rowPieces = [];
            for ($column = 6; $column >= 0; --$column) {
                $this->board[$row][$column] = null;
                $rowPieces[] = ' ' . str_pad((string) $this->board[$row][$column], 6, ' ');
            }
            $this->output->writeLine('|' . implode('|', $rowPieces) . '|');
            $this->output->writeLine(str_pad('', 65, '-'));
        }
    }
    public static function playersFactory(int $numberOfPlayers): array
    {
        $players = [];
        for ($playerNumber = 0; $playerNumber < $numberOfPlayers; ++$playerNumber) {
            if($playerNumber == 0){
                $players[] = new Player(); //attribution aléatoire de l'identifiant
            } else {
                $players[] = new Player($playerNumber + 1);
            }
        }
        return $players;
    }
}