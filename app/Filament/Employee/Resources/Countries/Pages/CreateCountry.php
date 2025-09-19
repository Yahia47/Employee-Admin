<?php

namespace App\Filament\Employee\Resources\Countries\Pages;

use App\Filament\Employee\Resources\Countries\CountryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCountry extends CreateRecord
{
    protected static string $resource = CountryResource::class;
}
