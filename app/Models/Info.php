<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

    protected $table = 'infos';

    protected $fillable = [
        'firstname',
        'surname',
        'age',
        'gender',
        'selection_list',
    ];

    protected $casts = [
        'age' => 'integer',
        'selection_list' => 'array',
        'gender' => 'string',
    ];

    // Return selection_list as an array (for checkboxes, etc.)
    public function getSelectionListAttribute($value): array
    {
        
        return $value ? explode(',', $value) : [];
    }

    // Accept array from form and store as comma-separated string for MySQL SET
    public function setSelectionListAttribute($value): void
    {
        if (is_array($value)) {
            $this->attributes['selection_list'] = implode(',', $value);
        } else {
            $this->attributes['selection_list'] = $value;
        }
    }
}
