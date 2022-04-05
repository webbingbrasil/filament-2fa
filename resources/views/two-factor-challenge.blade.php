<x-filament-2fa::auth-card action="verify">
    <div x-data="{ recovery: false }" class="grid gap-6">
        <div class="text-sm" x-show="! recovery">
            {{ __('filament-2fa::two-factor.message.confirm_access_with_authentication_code') }}
        </div>

        <div class="text-sm" x-show="recovery">
            {{ __('filament-2fa::two-factor.message.confirm_access_with_recovery_code') }}
        </div>


        <div x-show="! recovery">
            {{ $this->formTwoFactorCode }}
        </div>

        <div x-show="recovery">
            {{ $this->formTwoFactorRecovery }}
        </div>

        <div class="flex items-center gap-6 justify-end mt-4">
            <x-filament::button type="button" color="secondary" class="text-sm "
                                x-show="! recovery"
                                x-on:click="
                                    recovery = true;
                                    $nextTick(() => { $refs.recovery_code.focus() })
                                ">
                {{ __('filament-2fa::two-factor.button.use_recovery_code') }}
            </x-filament::button>

            <x-filament::button type="button"  color="secondary" class="text-sm"
                                x-show="recovery"
                                x-on:click="
                                    recovery = false;
                                    $nextTick(() => { $refs.code.focus() })
                                ">
                {{ __('filament-2fa::two-factor.button.use_authentication_code') }}
            </x-filament::button>

            <x-filament::button type="submit" class="ml-4">
                {{ __('filament-2fa::two-factor.button.log_in') }}
            </x-filament::button>
        </div>
    </div>
</x-filament-2fa::auth-card>
