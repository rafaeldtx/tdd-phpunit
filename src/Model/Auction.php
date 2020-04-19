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
    $user = $bet->getUser();
    $LastBetsKey = array_key_last($this->bets);

    if(!empty($this->bets) &&
       $user == $this->bets[$LastBetsKey]->getUser()) {
      throw new \DomainException("Not permitted bet sequence for user");
    } else if ($this->totalBetsByUser($user) >= 5) {
      throw new \DomainException("Not permitted more than 5 bets for user");
    }

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

  private function totalBetsByUser(User $user)
  {
    return array_reduce($this->bets, function(int $userBetsCount, Bet $bet) use($user) {
      if ($bet->getUser() == $user) {
        return $userBetsCount + 1;
      }
      return $userBetsCount;
    }, 0);
  }
}
