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

  public function testThrowExeceptionForLimitBetsByUser()
  {
    $user1 = new User('Joao');
    $user2 = new User('Maria');

    $auction = new Auction('Nissan Kicks');

    $auction->receiveBet(new Bet($user1, 1000));
    $auction->receiveBet(new Bet($user2, 1500));
    $auction->receiveBet(new Bet($user1, 2000));
    $auction->receiveBet(new Bet($user2, 2500));
    $auction->receiveBet(new Bet($user1, 3000));
    $auction->receiveBet(new Bet($user2, 3500));
    $auction->receiveBet(new Bet($user1, 4000));
    $auction->receiveBet(new Bet($user2, 4500));
    $auction->receiveBet(new Bet($user1, 5000));
    $auction->receiveBet(new Bet($user2, 5500));

    self::expectException(\DomainException::class);
    self::expectExceptionMessage('Not permitted more than 5 bets for user');

    $auction->receiveBet(new Bet($user1, 6000));
  }

  public function testThrowExeceptionForNotPermittedBetsSequences()
  {
    $user1 = new User('Joao');

    $auction = new Auction('Nissan Kicks');

    $auction->receiveBet(new Bet($user1, 1000));

    self::expectException(\DomainException::class);
    self::expectExceptionMessage('Not permitted bet sequence for user');

    $auction->receiveBet(new Bet($user1, 1500));
  }
}
