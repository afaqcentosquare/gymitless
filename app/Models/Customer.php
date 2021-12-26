<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
        'user_id',
        'company_name',
        'email',
        'password',
        'contact',
        'number',
        'mailing_addressline1',
        'mailing_addressline2',
        'mailing_city',
        'mailing_state_id',
        'mailing_zip_code',
        'payment_method',
        'bank_routing_number',
        'card_type',
        'card_number',
        'card_expiration_month',
        'card_expiration_year',
        'card_cvv',
        'created_at',
        'updated_at'
    ];

    public function customerNotes()
    {
        return $this->hasMany(LeadNote::class, 'customer_id', 'id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class, 'customer_id', 'id');
    }

    public function members()
    {
        return $this->hasMany(Member::class, 'customer_id', 'id');
    }

    
}
