<?php

namespace Tdd\Auction\Test\Model;

use PHPUnit\Framework\TestCase;
use Tdd\Auction\Model\Auction;
use Tdd\Auction\Model\Bet;
use Tdd\Auction\Model\User;

class AuctionTest extends TestCase {
  public function testBetsShouldBeInstanciedCorrectly()
  {
    $user = new User('joao');
    $bet = new Bet($user, 1500);

    $auction = new Auction('Fiat Uno 0km');
    $auction->receiveBet($bet);

    self::assertCount(1, $auction->getBets());
    self::assertEquals($auction->getBets()[0], $bet);
    self::assertEquals($auction->getDescription(), 'Fiat Uno 0km');
  }
}
