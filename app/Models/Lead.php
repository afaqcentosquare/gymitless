<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leads';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'contact',
        'number',
        'email',
        'primary_address',
        'addressline1',
        'addressline2',
        'city',
        'state',
        'zip_code',
        'created_at',
        'updated_at'
    ];

    public function leadNotes()
    {
        return $this->hasMany(LeadNote::class, 'lead_id', 'id');
    }
}
