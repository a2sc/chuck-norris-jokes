# Chuck Norris Jokes

Create random Chuck Norris Jokes.

## Purpose

This package is a test example package from the [Marcel Pociot](https://github.com/mpociot)'s PHP [Package Development Serie](https://phppackagedevelopment.com/). The must see serie to learn how to create a package!

This is the "Hello World" package build within the serie to learn how to properly create a PHP package and publish it on Packagist and understand all the caveats.

## Requirement

PHP version 7.2+

## Installation

Via Composer

```bash
composer require a2sc/chuck-norris-jokes
```

## Usage

```php
use A2sc\ChuckNorrisJokes\JokeFactory;

$jokes = new JokeFactory();

$joke = $jokes->getRandomJoke();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
