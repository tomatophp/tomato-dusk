![Screenshot](https://github.com/tomatophp/tomato-dusk/blob/master/art/screenshot.png)

# Tomato Dusk

Laravel Dusk unit test with GUI for Tomato Framework

## Installation

```bash
composer require tomatophp/tomato-dusk
```
after install use this command to install dusk

```bash
php artisan tomato-dusk:install
```

## Using

it's very easy to use just use this command

```bash
php artisan tomato:test
```

it will ask you about the test case name and it will generate a test class on path `tests/Browser/Tomato`

after you generate it you can add your code and after that register the class on the `tomato-dusk.php` config file and run

```bash
php artisan config:cache
```

you now can run your test cases by GUI or this command

```bash
php artisan tomato-dusk:run
```

## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/Xqmt35Uh)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/plugins/tomato-dusk)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

Please see [SECURITY](SECURITY.md) for more information about security.

## Credits

- [Fady Mondy](https://www.github.com/3x1io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
