<?php
namespace Contexts\Tests;

use Contexts\Context;
use function Contexts\with;

use PHPUnit\Framework\TestCase;
use Mockery;
use Exception;

class WithTest extends TestCase
{
  public function testWithoutExceptionHandling()
  {
    $context = Mockery::mock(Context::class);
    $context
      ->shouldReceive('enter')
      ->once()
      ->andReturn($context)
      ->ordered()
      ->shouldReceive('something')
      ->once()
      ->ordered()
      ->shouldReceive('quit')
      ->once()
      ->andReturnNull()
      ->ordered();

    with($context, function ($input) {
      $input->something();
    });

    $this->assertTrue(true);
  }

  /**
   * @expectedException \Exception
   */
  public function testWithExceptionButNotHandled()
  {
    $context = Mockery::mock(Context::class);
    $context
      ->shouldReceive('enter')
      ->once()
      ->andReturn(null)
      ->ordered()
      ->shouldReceive('quit')
      ->once()
      ->andReturnNull()
      ->ordered();

    with($context, function () {
      throw new Exception;
    });
  }

  public function testWithExceptionHandling()
  {
    $context = Mockery::mock(Context::class);
    $context
      ->shouldReceive('enter')
      ->once()
      ->andReturn(null)
      ->ordered()
      ->shouldReceive('quit')
      ->once()
      ->andReturn(true)
      ->ordered();

    with($context, function () {
      throw new Exception;
    });

    $this->assertTrue(true);
  }
}
