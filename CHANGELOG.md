# Changelog
All notable changes to this project will be documented in this file.

## [Unreleased]

Adding Laravel Support.

- Auto discovering package
- Use Facade `ChuckNorris`
```php
$joke = ChuckNorris::getRandomJoke();
```
- Use console
```bash
php artisan chuck-norris
```

## [2.0.0] - 2020-01-22

Jokes from [The Internet Chuck Norris Database API](http://www.icndb.com/api/).


## [1.0.0] - 2020-01-21

Initial release.
