@props(['title' => __('filament-2fa::two-factor.message.confirm_password'), 'content' => __('filament-2fa::two-factor.message.confirm_password_instructions'), 'button' => __('filament-2fa::two-factor.button.confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
    <x-filament::modal id="confirm-password">
        <x-slot name="header">
            {{ $title }}
        </x-slot>

        <p class="text-sm">
            {{ $content }}
        </p>

        <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <input @class([
                "block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70",
                'dark:bg-gray-700 dark:text-white' => config('forms.dark_mode'),
                'border-gray-300' => ! $errors->has('confirmable_password'),
                'dark:border-gray-600' => (! $errors->has('confirmable_password')) && config('forms.dark_mode'),
                'border-danger-600 ring-danger-600' => $errors->has('confirmable_password'),
                   ])
                   type="password"
                   placeholder="{{ __('filament-2fa::two-factor.field.password') }}"
                   x-ref="confirmable_password"
                   wire:model.defer="confirmablePassword"
                   wire:keydown.enter="confirmPassword" />

            @error('confirmable_password')
            <p class="text-sm text-danger-600 filament-forms-field-wrapper-error-message ">{{ $message }}</p>
            @enderror
        </div>

        <x-slot name="footer">
            <x-filament::button type="button" color="secondary" wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
                {{ __('filament-2fa::two-factor.button.cancel') }}
            </x-filament::button>

            <x-filament::button type="button" class="ml-3" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
                {{ $button }}
            </x-filament::button>
        </x-slot>
    </x-filament::modal>
@endonce
