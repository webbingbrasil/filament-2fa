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

        <p class="text-sm text-gray-600">
            {{ $content }}
        </p>

        <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-3/4"
                   type="password"
                   placeholder="{{ __('filament-2fa::two-factor.field.password') }}"
                   x-ref="confirmable_password"
                   wire:model.defer="confirmablePassword"
                   wire:keydown.enter="confirmPassword" />

            @error('confirmable_password')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
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
