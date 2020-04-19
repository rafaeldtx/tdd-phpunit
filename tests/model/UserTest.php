<?php

namespace Tdd\Auction\Test\Model;

use PHPUnit\Framework\TestCase;
use Tdd\Auction\Model\User;

class UserTest extends TestCase {
  public function testShouldSetUserName()
  {
    $user = new User('Rafael');

    self::assertEquals($user->name, 'Rafael');
  }
}
