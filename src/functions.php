<?php
namespace Contexts;

use Exception;

function with(Context $context, callable $function) 
{
  $exception = null;
  try {
    $input = $context->enter();
    return $function($input);
  } catch (Exception $ex) {
    $exception = $ex;
  } finally {
    $handled = $context->quit($exception);
    if ($exception && $handled !== true) {
      throw $exception;
    }
  }
}
