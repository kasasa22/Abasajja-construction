<?php

namespace App\Filament\Admin\Resources\Projects;

use App\Filament\Admin\Resources\Projects\Pages\ManageProjects;
use App\Models\Project;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Section::make('Basic Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->required()
                            ->unique(Project::class, 'slug', ignoreRecord: true),
                        Textarea::make('description')
                            ->columnSpanFull(),
                    ])->columns(2),

                \Filament\Forms\Components\Section::make('Project Details')
                    ->schema([
                        TextInput::make('location'),
                        TextInput::make('client'),
                        DatePicker::make('completion_date'),
                        \Filament\Forms\Components\Select::make('status')
                            ->options([
                                'completed' => 'Completed',
                                'ongoing' => 'Ongoing',
                                'planned' => 'Planned',
                            ])
                            ->required()
                            ->default('completed'),
                        Toggle::make('featured')
                            ->inline(false)
                            ->required(),
                    ])->columns(3),

                \Filament\Forms\Components\Section::make('Project Gallery')
                    ->schema([
                        \Filament\Forms\Components\Repeater::make('images')
                            ->relationship('images')
                            ->schema([
                                \Filament\Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('projects')
                                    ->required(),
                                TextInput::make('caption'),
                            ])
                            ->grid(2)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('client')
                    ->searchable(),
                TextColumn::make('completion_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                IconColumn::make('featured')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageProjects::route('/'),
        ];
    }
}
