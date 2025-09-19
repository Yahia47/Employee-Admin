<?php

namespace App\Filament\Employee\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;

class TestPageTwo extends Page
{
    protected static string $panel = 'employee';

    protected string $view = 'filament.employee.pages.test-page-two';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::User;
    protected static ?string $navigationLabel = 'Test Page 2';


    public static function canAccess(): bool
    {
        // return Auth::check() && Auth::user()->can('view test page 1');
        return Auth::check() && Auth::user()->hasRole('Employee');
        return Auth::user()->can('add on page 1');
    }


    public function addAction(): void
    {
        $this->notify('success', 'تم الضغط على زر الإضافة (Add)!');
    }
}
