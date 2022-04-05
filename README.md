# Filament 2FA Plugin

A Two Factor Authentication plugin for Filament

## Installation

1. Install the package via composer
```bash
composer require webbingbrasil/filament-2fa
```

2. Publish assets and run migrations

```bash
php artisan vendor:publish --tag="filament-2fa-migrations"
php artisan migrate
```

Optionally, you can publish config or views:

```bash
php artisan vendor:publish --tag="filament-2fa-config"
php artisan vendor:publish --tag="filament-2fa-views"
```

3. Add `\Webbingbrasil\FilamentTwoFactor\TwoFactorAuthenticatable` trait to your user model.

4. Update the `config/filament.php` to point to the Two Factor Login::class.

```php
"auth" => [
    "guard" => env("FILAMENT_AUTH_GUARD", "web"),
    "pages" => [
        "login" =>
            \Webbingbrasil\FilamentTwoFactor\Http\Livewire\Auth\Login::class,
    ],
],
```

## Integrate With Custom Profile Page

This package has a component for two-factor setup that can be easily added to a profile page, like the one for [filament-breezy](https://github.com/jeffgreco13/filament-breezy).

First, publish the [filament-breezy](https://github.com/jeffgreco13/filament-breezy) views:

```bash
php artisan vendor:publish --tag="filament-breezy-views"
```

Edit the file ``resources/views/vendor/filament-breezy/filament/pages/my-profile.blade.php`` to add a section with the `<livewire:filament-two-factor-form>` component:

```php
<hr />

<x-filament-breezy::grid-section class="mt-8">
    <x-slot name="title">
        {{ __('filament-2fa::two-factor.title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('filament-2fa::two-factor.description') }}
    </x-slot>

    <div class="space-y-3">
        <x-filament::card>
            <livewire:filament-two-factor-form>
        </x-filament::card>
    </div>
</x-filament-breezy::grid-section>
```

## Screenshots

![Two Factor Page](./images/two-factor-page.jpeg)
![Confirm Password](./images/confirm-password.jpeg)
![Finishing enable](./images/finishing-enable.jpeg)
![Recovery codes](./images/recovery-codes.jpeg)
![Enabled](./images/enabled.jpeg)
![Challenge](./images/challenge.jpeg)
![Breezy](./images/breezy.png)

## Credits

-   [Danilo Andrade](https://github.com/dmandrade)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
