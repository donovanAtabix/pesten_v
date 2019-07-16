<?php

namespace pesten;

class Game
{
    //Game properties
    protected $playCard;
    protected $isWinner = false;
    protected $playersCantPlay = false;
    public $players = [];

    public function theLastCard(Deck $deck, Player $player)
    {
        if ($deck->getDeckSize() == 1) {
            echo $player->getName() . " This is the last card ! ";
            echo "<br>";
        }
    }

    //sets the starting position of players
    public function startingPlayers($startTingPlayers, $startingHandSize, Deck $deck)
    {
        for ($i = 0; $i < $startTingPlayers; $i++) {
            array_push($this->players, $player = new Player("player. $i "));
            $this->players[$i]->setHand($deck, $startingHandSize);
        }
    }
    //gets the count of players that need to skip a turn
    public function getPlayerCount(Player $player)
    {
        $player->getCount();
    }

    //gets played card
    public function getPlayCard()
    {
        return $this->playCard;
    }
    //sets first card from the game and pops the last card from deck
    public function firstCard(array $deck)
    {
        $this->playCard = array_pop($deck);
    }
    //sets
    public function setPlayCard($playCard)
    {
        $this->playCard = $playCard;
    }
    //gets the winner of the game
    public function getWinner()
    {
        return $this->isWinner;
    }
    //sets winner
    public function setWinner(Player $player)
    {
        if (count($player->getHand()) == 0) {

            $this->isWinner = true;

            echo $player->getName() . ' you have won !!!';
        }
    }
    //looks if players cant play
    public function drawGame(array $countCantPlay)
    {

        $players = count($this->players);
        //dd(["this is counted players" => $players]);
        if (count($countCantPlay) == $players) {
            echo 'game has ended in a draw !!';
            return $this->playersCantPlay = true;
        }
    }
}
