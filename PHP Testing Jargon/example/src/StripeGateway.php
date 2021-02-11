<?php

namespace App;

class StripeGateway implements Gateway
{
  public function create()
  {
    var_dump('Slow HTTP request in progress.');
  }
}
