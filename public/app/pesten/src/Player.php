<?php

namespace pesten;

class Player
{
    // const START_HAND_AMOUNT = 7;

    //player properties
    private  $name;
    /** @var array */
    private  $hand = [];
    /** @var int */
    private  $count = 0;

    //constructs name
    public function __construct($name)
    {
        $this->name = $name;
    }

    //gets name
    public function getName()
    {
        $this->name;
    }

    /**
     * Some docs is nice. IN this format
     *
     * @return void
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Undocumented function
     *
     * @param Deck $deck
     * @param Player $player
     * @return void
     */
    public function takeCard(Deck $deck, Player $player): void
    {
        $card = array_pop($deck->cards);
        $player->hand[] = $card;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    //gives a player zeven cards from deck
    public function setHand(Deck $deck, $startingHandSize)
    {
        for ($i = 0; $i < $startingHandSize; $i++) {
            $card = array_pop($deck->cards);
            $this->hand[] = $card;
        }
    }

    //draws player card, skips a turn if player cant play a card, draws a card if play card
    public function playCard($playCard, Deck $deck)
    {
        foreach ($this->hand as $index => $value) {
            $this->count = 0;

            $cardCanBePlayed = $value[0] == $playCard[0] || $value[1] == $playCard[1];
            if ($cardCanBePlayed) {
                echo $this->name . ' played ' . $value[1] . ' of ' . $value[0]; // method
                echo "<br>";

                $playCard = $this->hand[$index]; //refractor name
                unset($this->hand[$index]);
                return $playCard;
            }
        }

        if ($deck->getDeckSize() == 0) { // S stands for SOLID
            $this->count++;
            return $playCard;
        }

        $this->takeCard($deck, $this); // method
        echo $this->name . ' draws card';
        echo "<br>";
        return $playCard;
    }
}
