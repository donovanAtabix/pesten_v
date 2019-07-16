<?php

error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use pesten\Deck;
use pesten\Game;

//makes a game table with cards
$gameTable = new Game();
$deck = new Deck();
//builds a deck of cards
$deck->generate();
//plays the first card;
$gameTable->firstCard($deck->getCards());

//set amount of players
$startingPlayers = 6;
$startingHandSize = 6;
$gameTable->startingPlayers($startingPlayers, $startingHandSize, $deck);


//displays the first card on table
echo "The first card is " . $gameTable->getPlayCard()[1] . " of " . $gameTable->getPlayCard()[0];
echo "<br>";
echo "<br>";

//start of game
while ($gameTable->getWinner() != true) {

    $lastCardCompaireValue = 1;
    $playersCantDraw = [];

    foreach ($gameTable->players as $player) {
        $gameTable->setPlayCard($player->playCard($gameTable->getPlayCard(), $deck));
        $gameTable->setWinner($player);

        if ($gameTable->getWinner() == true)
            break;

        if ($player->getCount() == $lastCardCompaireValue) {

            array_push($playersCantDraw, $gameTable->getPlayerCount($player));
        }
        $gameTable->theLastCard($deck, $player);
    }

    if ($gameTable->drawGame($playersCantDraw))
        break;
}

unset($playersCantDraw);
