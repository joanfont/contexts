# Contexts
[![Build Status](https://travis-ci.org/joanfont/contexts.svg?branch=master)](https://travis-ci.org/joanfont/contexts)
[![codecov](https://codecov.io/gh/joanfont/contexts/branch/master/graph/badge.svg)](https://codecov.io/gh/joanfont/contexts)

a PHP library that emulates Python's `with` statement


## Example
```php
<?php
use function Contexts\with;
use Contexts\Context;

class TestContext implements Context
{
  public function enter()
  {
    print("Before executing function\n");
  }

  public function quit($exception)
  {
    print("After executing function\n");
  }
}

$context = new TestContext;
with($context, function() {
  print("Executing function\n");
});

?>
```

## Testing
```bash
phpunit tests
```

## Credits
* [Joan Font](https://github.com/joanfont)
* [Hugo Chinchilla](https://github.com/hugochinchilla)
