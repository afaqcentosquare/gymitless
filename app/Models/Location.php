<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';

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
        'customer_id',
        'zip_code',
        'location_name',
        'location_type',
        'latitude',
        'longitude',
        'addressline1',
        'addressline2',
        'city',
        'state_id',
        'website',
        'created_at',
        'updated_at'
    ];

    public function timings()
    {
        return $this->hasMany(Timing::class, 'location_id', 'id');
    }
}
