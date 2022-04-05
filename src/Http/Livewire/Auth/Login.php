<?php

namespace Webbingbrasil\FilamentTwoFactor\Http\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Forms\ComponentContainer;
use Filament\Http\Livewire\Auth\Login as FilamentLogin;
use Filament\Http\Responses\Auth\Contracts\LoginResponse as FilamentLoginResponse;
use Webbingbrasil\FilamentTwoFactor\FilamentTwoFactor;
use Webbingbrasil\FilamentTwoFactor\Http\Responses\Auth\LoginResponse as TwoFactorLoginResponse;

/**
 * @property ComponentContainer $form
 */
class Login extends FilamentLogin
{
    public function authenticate(): ?FilamentLoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->addError('email', __('filament::login.messages.throttled', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => ceil($exception->secondsUntilAvailable / 60),
            ]));

            return null;
        }

        $data = $this->form->getState();
        $user = $this->validateCredentials($data);

        if (app(FilamentTwoFactor::class)->hasTwoFactorEnabled($user)) {
            request()->session()->put([
                'login.id' => $user->getKey(),
                'login.remember' => $data['remember'],
            ]);

            return app(TwoFactorLoginResponse::class);
        }

        if (! Filament::auth()->attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ], $data['remember'])) {
            $this->addError('email', __('filament::login.messages.failed'));

            return null;
        }

        return app(FilamentLoginResponse::class);
    }

    protected function validateCredentials($data)
    {
        $model = Filament::auth()->getProvider()->getModel();

        return tap($model::where('email', $data['email'])->first(), function ($user) use ($data) {
            if (! $user || ! Filament::auth()->getProvider()->validateCredentials($user, ['password' => $data['password']])) {
                $this->addError('email', __('filament::login.messages.failed'));
            }
        });
    }
}
