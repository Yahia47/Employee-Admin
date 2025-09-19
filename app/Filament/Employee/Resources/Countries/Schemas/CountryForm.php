<?php

namespace App\Filament\Employee\Resources\Countries\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CountryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('capital'),
                TextInput::make('area')->numeric(),
                Textarea::make('currencies')->helperText('JSON format'),
                Textarea::make('languages')->helperText('JSON format'),
            ]);
    }
}
