# Google One Tap provider for Laravel Socialite

[![Latest Version on Packagist](https://img.shields.io/packagist/v/serdud/socialite-google-one-tap.svg?style=flat-square)](https://packagist.org/packages/serdud/socialite-google-one-tap)
[![Total Downloads](https://img.shields.io/packagist/dt/serdud/socialite-google-one-tap.svg?style=flat-square)](https://packagist.org/packages/serdud/socialite-google-one-tap)

## Installation & Basic Usage

```bash
composer require serdud/socialite-google-one-tap
```

### Add configuration to `config/services.php`

```php
'google' => [
  'client_id' => env('GOOGLE_CLIENT_ID'),
  'client_secret' => env('GOOGLE_CLIENT_SECRET'),
  'redirect' => env('GOOGLE_REDIRECT_URI')
],
```

### Usage

You should now be able to use the provider like you would regularly use Socialite:

```php
return Socialite::driver('google-one-tap')->stateless()->userFromToken($token);
```
> **Note**
> Use `google` driver name if you're using version < 2.0.0

> **Note**
> The token is returned in the `credential` field

### Returned User fields

- `id`
- `nickname`
- `name`
- `email`
- `avatar`
- `given_name`
- `family_name`

## Credits

- [serdud](https://github.com/serdud)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
