<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['name', 'lastname', 'phone', 'email'];

    protected $casts = [
        'created_at' => 'registration_date',
    ];
    public function addresses()
    {
        return $this->hasMany('Address');
    }
}
