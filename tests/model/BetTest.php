<?php

namespace Tdd\Auction\Test\Model;

use PHPUnit\Framework\TestCase;
use Tdd\Auction\Model\Bet;
use Tdd\Auction\Model\User;

class BetTest extends TestCase {
  public function testShouldBeInstanciedCorrectly()
  {
    $user = new User('joao');
    $bet = new Bet($user, 1500);

    self::assertEquals($bet->getUser(), $user);
    self::assertEquals($bet->getBetValue(), 1500);
  }
}
