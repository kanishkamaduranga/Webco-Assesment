<?php

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use App\Filament\Resources\ProductCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;

    protected function afterCreate(): void
    {
        // Redirect to the edit form after creation
        $this->redirect($this->getResource()::getUrl('edit', ['record' => $this->record]));
    }
}
