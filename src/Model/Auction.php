<?php

namespace Tdd\Auction\Model;

use Tdd\Auction\Model\Bet;

class Auction {
  /** @var Bet[] */
  private $bets = [];
  /** @var string */
  private $description;

  public function __construct(string $description)
  {
    $this->description = $description;
  }


  public function receiveBet(Bet $bet)
  {
    $this->bets[] = $bet;
  }

  public function getBets()
  {
    return $this->bets;
  }

  public function getDescription()
  {
    return $this->description;
  }
}
