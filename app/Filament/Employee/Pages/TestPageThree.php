<?php

namespace App\Filament\Employee\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;

class TestPageThree extends Page
{
    protected static string $panel = 'employee';

    protected string $view = 'filament.employee.pages.test-page-three';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::User;
    protected static ?string $navigationLabel = 'Test Page 3';


    public static function canAccess(): bool
    {
        // return Auth::check() && Auth::user()->can('view test page 1');
        // return Auth::check() && Auth::user()->can('Add on test page 1');
        return Auth::check() && Auth::user()->hasRole('Employee');
    }

    public function deleteAction()
    {
        array_pop($this->rows);
    }
}
