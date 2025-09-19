<?php

namespace App\Filament\Employee\Pages;

use Filament\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class TestPageOne extends Page
{
    protected static string $panel = 'employee';

    protected string $view = 'filament.employee.pages.test-page-one';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::User;



    protected static ?string $navigationLabel = 'Test Page 1';

    public static function canAccess(): bool
    {
        // return Auth::check() && Auth::user()->can('view test page 1');
        return Auth::check() && Auth::user()->hasRole('Employee');
    }
    public $rows = [
        ['id' => 1, 'name' => 'Data 1'],
        ['id' => 2, 'name' => 'Data 2'],
    ];

    public $nextId = 3;

    public function addAction()
    {
        $this->rows[] = [
            'id' => $this->nextId,
            'name' => 'Data ' . $this->nextId,
        ];
        $this->nextId++;
    }

    public function deleteAction()
    {
        array_pop($this->rows);
    }
}
