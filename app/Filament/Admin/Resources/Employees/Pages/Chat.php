<?php

namespace App\Filament\Admin\Resources\Employees\Pages;

use App\Filament\Admin\Resources\Employees\EmployeeResource;
use Filament\Resources\Pages\Page;

class Chat extends Page
{
    protected static string $resource = EmployeeResource::class;

    protected string $view = 'filament.admin.resources.employees.pages.chat';
}
