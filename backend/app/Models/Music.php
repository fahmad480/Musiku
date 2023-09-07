<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'musics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'album_id',
        'title',
        'genre',
        'year',
        'image',
        'file',
        'duration',
        'size',
        'deleted_by'
    ];

    /**
     * Get the album that owns the music.
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * Get the artist that owns the album that owns the music.
     */
    public function artist()
    {
        // return $this->belongsToThrough(Artist::class, Album::class);
        return $this->album->artist;
    }

    /**
     * Get the saved music that saved the music.
     */
    public function savedMusic()
    {
        return $this->hasMany(SavedMusic::class);
    }
}
