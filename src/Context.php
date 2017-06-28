<?php
namespace Contexts;

interface Context
{
  public function enter();

  public function quit();
}
