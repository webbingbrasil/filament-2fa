<?php

namespace Webbingbrasil\FilamentTwoFactor\Http\Livewire;

use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Pages;
use Filament\Pages\Actions\ButtonAction;
use Illuminate\Support\Collection;
use Livewire\Component;
use Webbingbrasil\FilamentTwoFactor\ConfirmsPasswords;
use Webbingbrasil\FilamentTwoFactor\FilamentTwoFactor;

class TwoFactorAuthenticationForm extends Component  implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use ConfirmsPasswords;

    /**
     * Indicates if two factor authentication recovery codes are being displayed.
     *
     * @var bool
     */
    public $showingRecoveryCodes = false;

    /**
     * The two factor authentication provider.
     *
     * @var \Webbingbrasil\FilamentTwoFactor\FilamentTwoFactor
     */
    protected $twoFactor;

    /**
     * The OTP code for confirming two factor authentication.
     *
     * @var string|null
     */
    public $code;

    public function boot()
    {
        $this->twoFactor = app(FilamentTwoFactor::class);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('code')
                ->label(__('filament-2fa::two-factor.field.code'))
                ->rules('nullable|string'),
        ];
    }

    /**
     * Enable two factor authentication for the user.
     *
     * @return void
     */
    public function enableTwoFactorAuthentication()
    {
        $this->ensurePasswordIsConfirmed();

        $this->user->forceFill([
            'two_factor_secret' => encrypt($this->twoFactor->generateSecretKey()),
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return $this->twoFactor->generateRecoveryCode();
            })->all())),
        ])->save();
    }

    /**
     * Confirm two factor authentication for the user.
     *
     * @return void
     */
    public function confirmTwoFactorAuthentication()
    {
        $this->ensurePasswordIsConfirmed();

        if (empty($this->user->two_factor_secret) ||
            empty($this->code) ||
            ! $this->twoFactor->verify(decrypt($this->user->two_factor_secret), $this->code)) {
            $this->addError('code', __('filament-2fa::two-factor.message.invalid_code'));

            return;
        }

        $this->user->forceFill([
            'two_factor_confirmed_at' => now(),
        ])->save();

        $this->showingRecoveryCodes = true;
    }

    /**
     * Display the user's recovery codes.
     *
     * @return void
     */
    public function showRecoveryCodes()
    {
        $this->ensurePasswordIsConfirmed();
        $this->showingRecoveryCodes = true;
    }

    /**
     * Generate new recovery codes for the user.
     *
     * @return void
     */
    public function regenerateRecoveryCodes()
    {
        $this->ensurePasswordIsConfirmed();

        $this->user->forceFill([
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return $this->twoFactor->generateRecoveryCode();
            })->all())),
        ])->save();

        $this->showingRecoveryCodes = true;
    }

    /**
     * Disable two factor authentication for the user.
     *
     * @return void
     */
    public function disableTwoFactorAuthentication()
    {
        $this->ensurePasswordIsConfirmed();

        $this->user->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ])->save();

        $this->showingRecoveryCodes = false;
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Filament::auth()->user();
    }

    /**
     * Determine if two factor authentication is enabled.
     *
     * @return bool
     */
    public function getEnabledProperty()
    {
        return ! empty($this->user->two_factor_secret);
    }

    /**
     * Determine if two factor authentication is enabled.
     *
     * @return bool
     */
    public function getConfirmedProperty()
    {
        return ! empty($this->user->two_factor_confirmed_at);
    }

    public function render()
    {
        return view('filament-2fa::livewire.two-factor-authentication-form');
    }
}
