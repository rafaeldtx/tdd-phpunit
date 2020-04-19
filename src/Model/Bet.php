<?php

namespace Tdd\Auction\Model;

class Bet {
  private $value;
  private $user;

  public function __construct(User $user, $value)
  {
    $this->user = $user;
    $this->value = $value;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getBetValue()
  {
    return $this->value;
  }
}
