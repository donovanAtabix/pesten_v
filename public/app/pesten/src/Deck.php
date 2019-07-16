<?php

namespace pesten;

class Deck
{
    public $cards = [];

    public function getCards()
    {
        return $this->cards;
    }

    public function  setCards(array $cards)
    {
        $this->cards = $cards;
    }

    public function getDeckSize()
    {
        return count($this->cards);
    }

    public function generate()
    {
        // CARD class?
        $suits = ["♠", "♥", "♦", "♣"];
        $cardNumbers = ["Ace", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King"];

        foreach ($suits as $suit) {
            foreach ($cardNumbers as $cardNumber) {
                $card = [$suit, $cardNumber];
                $this->cards[] = $card;
            }
        }

        shuffle($this->cards);
    }
}
