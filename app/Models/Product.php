<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    // protected $table = 'events';
    // protected $primaryKey = 'id';
    // public $timestamps = true;
    // protected $guarded = [];

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
        'published',
    ];
    
    protected $attributes = [
        'published' => false,
    ];

    // protected $hidden = [
    // ];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'admin_id');
    // }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    // public function scopeByEvent($query, $eventId)
    // {
    //     return $query->where('event_id', $eventId);
    // }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    // public function getNameAttribute($value)
    // {
    //     return ucfirst($value);
    // }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtolower($value);
    // }
}
