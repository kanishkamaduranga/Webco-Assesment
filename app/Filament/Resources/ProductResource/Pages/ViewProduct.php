<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Forms;
use Filament\Forms\Form;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('back')
            ->label('Back to Grid')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            TextEntry::make('name')
                ->label('Name'),
            TextEntry::make('price')
                ->label('Price')
                ->money('LKR'),
            TextEntry::make('description')
                ->label('Description'),
            TextEntry::make('status')
                ->label('Active')
                ->formatStateUsing(fn (bool $state) => $state ? 'Yes' : 'No'),
            TextEntry::make('category.name')
                ->label('Category'),
            TextEntry::make('color.name')
                ->label('Color'),
        ];
    }
}
