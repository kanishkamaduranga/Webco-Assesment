<?php
namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Models\TypeAssignment;
use App\Models\ProductType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class TypeAssignmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'typeAssignments';
    protected static ?string $title = 'Types';
    protected static ?string $recordTitleAttribute = 'my_bonus_field';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('my_bonus_field')
                    ->label('Bonus Field')
                    ->required(),
                Forms\Components\Select::make('type_id')
                    ->label('Type')
                    ->options(ProductType::all()->pluck('name', 'id'))
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('productType.name')
                    ->label('Type'),
                Tables\Columns\TextColumn::make('my_bonus_field')
                    ->label('Bonus'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add New Type')
                    ->modalHeading('Add New Type Assignment')
                    ->form([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                    Forms\Components\TextInput::make('name')
                                        ->label('Type Name')
                                        ->required(),
                                    Forms\Components\TextInput::make('my_bonus_field')
                                        ->label('Bonus Field')
                                        ->required(),
                                ])
                            ])
                    ->action(function (array $data) {
                        $record = $this->getOwnerRecord(); // Get the parent record
                        if (!$record) {
                            throw new \Exception('Parent record not found.');
                        }

                        // Create or find the ProductType
                        $productType = ProductType::firstOrCreate([
                            'name' => $data['name'],
                        ], [
                            'api_unique_number' => null, // Set to nullable
                        ]);

                        // Create the TypeAssignment
                        TypeAssignment::create([
                            'type_assignment_id' => $record->id,
                            'type_assignments_type' => get_class($record),
                            'my_bonus_field' => $data['my_bonus_field'],
                            'type_id' => $productType->id,
                        ]);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Grid::make(2) // Split the form into 2 columns
                        ->schema([
                            Forms\Components\TextInput::make('type_name') // Custom field for Type Name
                            ->label('Type Name')
                                ->required()
                                ->afterStateHydrated(function ($component, $state, $record) {
                                    // Populate the field with the existing Type Name
                                    $component->state($record->productType->name);
                                }),
                            Forms\Components\TextInput::make('my_bonus_field')
                                ->label('Bonus Field')
                                ->required(),
                        ]),
                    ])
                    ->action(function (array $data, $record) {
                        // Update the ProductType name
                        $record->productType->update([
                            'name' => $data['type_name'],
                        ]);

                        // Update the TypeAssignment
                        $record->update([
                            'my_bonus_field' => $data['my_bonus_field'],
                        ]);
                    }),

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
