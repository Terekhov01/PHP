<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Address extends Model
{
    use HasFactory, Notifiable;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['name', 'city', 'street', 'building', 'floor', 'flat', 'intercom'];

    const CREATED_AT = 'addition_date';

    public function customer()
    {
        return $this->belongsTo('Customer');
    }
}
