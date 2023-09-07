<?php

namespace App\Http\Controllers\Api;

use App\Models\Music;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MusicResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $userId = Auth::id();

        if ($request->title) {
            //get musics with album and artist
            $musics = Music::with(['album.artist','savedMusic' => function ($query) use ($userId) {
                //Filter savedMusic berdasarkan user_id
                $query->where('user_id', $userId);
            }])->where('title', 'like', '%'.$request->title.'%')->paginate(10);
        } else {
            //get musics with album and artist
            $musics = Music::with(['album.artist', 'savedMusic' => function ($query) use ($userId) {
                //Filter savedMusic berdasarkan user_id
                $query->where('user_id', $userId);
            }])->paginate(10);
        }
        
        //return collection of musics as a resource
        return new MusicResource(true, 'List Data Music', $musics);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'album_id' => 'required|integer|exists:albums,id',
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'year' => 'required|integer',
            // 'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'file' => 'required|mimes:mp3,wav,ogg,m4a|max:51200',
            'duration' => 'required|integer',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/musics_cover', $image->hashName());

        //upload file
        $file = $request->file('file');
        $file->storeAs('public/musics', $file->hashName());

        //create music
        $music = Music::create([
            'album_id' => $request->album_id,
            'title' => $request->title,
            'genre' => $request->genre,
            'year' => $request->year,
            // 'image' => $image->hashName(),
            'file' => $request->file('file')->hashName(),
            'duration' => $request->duration,
            'size' => $request->file('file')->getSize(),
        ]);

        //return response
        return new MusicResource(true, 'Music Data succesfully added!', $music);
    }

    /**
     * show
     *
     * @param  mixed $music
     * @return void
     */
    public function show(Music $music)
    {
        //return single music with artist and album as a resource
        return new MusicResource(true, 'Music Data Found!', $music->load('album.artist'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $music
     * @return void
     */
    public function update(Request $request, Music $music)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'album_id' => 'integer|exists:albums,id',
            'title' => 'string|max:255',
            'genre' => 'string|max:255',
            'year' => 'integer',
            'duration' => 'integer',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $music->album_id = ($request->album_id) ? $request->album_id : $music->album_id;
        $music->title = ($request->title) ? $request->title : $music->title;
        $music->genre = ($request->genre) ? $request->genre : $music->genre;
        $music->year = ($request->year) ? $request->year : $music->year;
        $music->duration = ($request->duration) ? $request->duration : $music->duration;

        //check if image is not empty
        // if ($request->hasFile('image')) {
        //     // define validation rules
        //     $validator = Validator::make($request->all(), [
        //         'image' => 'image|mimes:png,jpg,jpeg|max:2048',
        //     ]);

        //     //upload image
        //     $image = $request->file('image');
        //     $image->storeAs('public/musics_cover', $image->hashName());

        //     //delete old image
        //     Storage::delete('public/musics_cover/'.$music->image);

        //     $music->image = $image->hashName();
        // }

        //check if file is not empty
        if ($request->hasFile('file')) {
            // define validation rules
            $validator = Validator::make($request->all(), [
                'file' => 'mimes:mp3,wav,ogg,m4a|max:51200',
            ]);

            //upload file
            $file = $request->file('file');
            $file->storeAs('public/musics', $file->hashName());

            //delete old file
            Storage::delete('public/musics/'.$music->file);

            $music->file = $file->hashName();
            $music->size = $request->file('file')->getSize();
        }

        //save music
        $music->save();

        //return response
        return new MusicResource(true, 'Music data updated!', $music);
    }

    /**
     * destroy
     *
     * @param  mixed $music
     * @return void
     */
    public function destroy(Music $music)
    {
        // //delete image
        // Storage::delete('public/musics_cover/'.$music->image);

        //delete file
        Storage::delete('public/musics/'.$music->file);

        //delete music
        $music->delete();

        //return response
        return new MusicResource(true, 'Music data deleted!', null);
    }
}
