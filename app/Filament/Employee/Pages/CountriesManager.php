<?php

namespace App\Filament\Employee\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class CountriesManager extends Page
{
    protected string $view = 'filament.employee.pages.countries-manager';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Map;
}
