<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Choice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($choice) {
            $choice->uuid = (string) Str::uuid();
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    /* 
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    */

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
