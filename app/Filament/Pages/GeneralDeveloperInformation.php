<?php

namespace App\Filament\Pages;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use App\Models\GeneralDeveloperInformation as ModelsGeneralDeveloperInformation;

class GeneralDeveloperInformation extends Page
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.general-developer-information';

    protected static ?string $navigationGroup = 'Home Page Content';

    public function mount()
    {
        $this->form->fill(ModelsGeneralDeveloperInformation::first()?->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(['default' => 1, 'lg' => 12]) // Outer grid with 12 columns
                    ->schema([
                        // Main Content Area (spans 9 columns)
                        Card::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Developer Name')
                                    ->required()
                                    ->minLength(3)
                                    ->maxLength(50)
                                    ->placeholder('Enter your full name')
                                    ->helperText('This will appear as the developer’s name.')
                                    ->prefixIcon('heroicon-o-user-circle'),

                                TextInput::make('address')
                                    ->label('Address')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Enter the developer’s address')
                                    ->helperText('This address will appear on the developer’s profile.')
                                    ->prefixIcon('heroicon-o-home'),

                                TextInput::make('email')
                                    ->label('Email Address')
                                    ->required()
                                    ->email()
                                    ->placeholder('Enter developer’s email')
                                    ->helperText('The email will be used for contacting the developer.')
                                    ->prefixIcon('heroicon-o-envelope'),

                                // Row for Country Code and Phone Number
                                PhoneInput::make('phone'),

                                TextInput::make('years_of_experience')
                                    ->label('Years of Experience')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(50)
                                    ->placeholder('Enter years of experience')
                                    ->helperText('Please enter a number between 0 and 50.'),

                                TextInput::make('projects')
                                    ->label('Completed Projects')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0)
                                    ->placeholder('Enter total completed projects')
                                    ->helperText('Total number of projects completed.'),

                                RichEditor::make('description')
                                    ->label('Developer Description')
                                    ->required()
                                    ->placeholder('Write a brief summary about the developer...')
                                    ->helperText('This description is visible on the home page.'),
                            ])
                            ->columnSpan(9),

                        // Sidebar Area for CV Upload (spans 3 columns)
                        Card::make()
                            ->schema([
                                FileUpload::make('cv')
                                    ->label('Upload CV')
                                    ->acceptedFileTypes(['application/pdf']) // Validates the file type as PDF
                                    ->enableDownload()
                                    ->previewable()
                                    ->helperText('Upload your CV in PDF format.')
                            ])
                            ->columnSpan(3),
                    ]),
            ])
            ->columns(12)
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save')
        ];
    }

    public function save(): void
    {
        try {
            // Get the form data
            $data = $this->form->getState();

            // Handle the file upload for CV
            if (isset($data['cv']) && $data['cv'] instanceof \Illuminate\Http\UploadedFile) {
                // Store the file in the 'cv_uploads' directory and get the file path
                $cvPath = $data['cv']->storeAs('cv_uploads', 'cv_' . time() . '.pdf', 'public');
                // Update the cv field with the file path
                $data['cv'] = $cvPath;
            }

            // Combine country code and phone number
            if (isset($data['country_code']) && isset($data['phone'])) {
                $data['phone'] = $data['country_code'] . ' ' . $data['phone'];
            }

            // Check if a record already exists
            $existingRecord = ModelsGeneralDeveloperInformation::first();

            if ($existingRecord) {
                // Update the existing record with the new data (including the CV file path)
                $existingRecord->update($data);
                Notification::make()
                    ->success()
                    ->title('Developer Information Updated!')
                    ->body('The information has been successfully updated and is now live on the homepage.')
                    ->send();
            } else {
                // Create a new record if no existing data
                ModelsGeneralDeveloperInformation::create($data);
                Notification::make()
                    ->success()
                    ->title('Developer Information Saved!')
                    ->body('The information has been successfully added and is now live on the homepage.')
                    ->send();
            }
        } catch (\Exception $exception) {
            // Handle any exceptions (e.g., file upload errors)
            Notification::make()
                ->danger()
                ->title('An Error Occurred')
                ->body($exception->getMessage())
                ->send();
        }
    }
}
