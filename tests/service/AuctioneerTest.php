<?php

namespace Tdd\Auction\Test\Service;

use PHPUnit\Framework\TestCase;
use Tdd\Auction\Model\Auction;
use Tdd\Auction\Model\Bet;
use Tdd\Auction\Model\User;
use Tdd\Auction\Service\Auctioneer;

class AuctioneerTest extends TestCase
{
  private $auctioneer;

  public function setUp(): void
  {
    $this->auctioneer = new Auctioneer();
  }
  /**
   * @dataProvider setBets
  */
  public function testShouldGetGreaterBets(Auction $auction, int $limit, array $values)
  {
    $auctioneer = new Auctioneer();
    $auctioneer->inspect($auction);

    $greaterBets = $auctioneer->getGreaterBets($limit);
    self::assertCount($limit, $greaterBets);

    foreach ($values as $i => $value) {
      self::AssertEquals($greaterBets[$i]->getBetValue(), $value);
    }
  }

  /**
   * @dataProvider setBets
  */
  public function testThrowExceptionForEmptyInpection()
  {
    $auction = new Auction('Moto 0km');
    $auctioneer = new Auctioneer();

    self::expectException(\DomainException::class);
    self::expectExceptionMessage('Not possible inspect empty bets');
    $auctioneer->inspect($auction);
  }

  public function setBets()
  {
    $user1 = new User('joao');
    $user2 = new User('maria');

    $auction = new Auction('Fiat uno 0km');

    $auction->receiveBet(new Bet($user1, 2500));
    $auction->receiveBet(new Bet($user2, 3500));
    $auction->receiveBet(new Bet($user1, 4000));

    return [
      'limited to 1 bet' => [$auction, 1, [4000]],
      'limited to 2 bets' => [$auction, 2, [4000, 3500]]
    ];
  }
}
