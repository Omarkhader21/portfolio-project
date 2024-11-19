<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GeneralDeveloperInformation extends Model
{
    use HasFactory;

    protected $table = 'general_developer_informations';

    protected $fillable = [
        'name',
        'description',
        'years_of_experience',
        'projects',
        'cv',
    ];

    // Accessor for years_of_experience
    public function getExperienceInYearsAttribute()
    {
        return $this->years_of_experience . ' years';
    }

    // Mutator to store the CV
    public function setCvAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            // Store the file and save the relative path to the 'cv' attribute
            $this->attributes['cv'] = $value->store('cvs', 'public');
        } elseif (is_string($value)) {
            // If it's already a file path (string), store it directly
            $this->attributes['cv'] = $value;
        }
    }

    // Scope to filter developers with more than a certain number of years of experience
    public function scopeExperienced($query, $years)
    {
        return $query->where('years_of_experience', '>', $years);
    }

    // Validation rules for the model
    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'years_of_experience' => 'integer|min:0',
            'projects' => 'integer|min:0',
            'cv' => 'nullable|file|mimes:pdf|max:2048', // Allow PDF file types and limit size to 2MB
        ];
    }
}
