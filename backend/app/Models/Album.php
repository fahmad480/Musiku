<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'artist_id',
        'title',
        'slug',
        'image',
        'description',
        'year',
        'deleted_by'
    ];

    /**
     * Get the artist that owns the album.
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Get the musics for the album.
     */
    public function musics()
    {
        return $this->hasMany(Music::class);
    }
}
