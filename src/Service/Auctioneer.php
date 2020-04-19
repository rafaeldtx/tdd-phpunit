<?php

namespace Tdd\Auction\Service;

use Tdd\Auction\Model\Auction;

class Auctioneer {
  private $auction;

  public function inspect(Auction $auction)
  {
    if (empty($auction->getBets())) {
      throw new \DomainException('Not possible inspect empty bets');
    }
    $this->auction = $auction;
  }

  public function getGreaterBets(int $limit)
  {
    $bets = $this->auction->getBets();
    rsort($bets);

    return array_slice($bets, 0, $limit);
  }
}
