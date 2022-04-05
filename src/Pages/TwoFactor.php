<?php

namespace Webbingbrasil\FilamentTwoFactor\Pages;

use Filament\Pages\Page;

class TwoFactor extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static string $view = 'filament-2fa::filament.pages.two-factor';

    public static function getNavigationLabel(): string
    {
        return __('filament-2fa::two-factor.navigation_label');
    }

    protected function getTitle(): string
    {
        return __('filament-2fa::two-factor.title');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return config('filament-2fa.show_two_factor_page_in_navbar');
    }
}
