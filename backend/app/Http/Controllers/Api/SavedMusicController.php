<?php

namespace App\Http\Controllers\Api;

use App\Models\SavedMusic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SavedMusicResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SavedMusicController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        if ($request->title) {
            //get savedMusics
            $savedMusics = SavedMusic::with('music.album.artist')->where('user_id', auth()->user()->id)->whereHas('music', function ($query) use ($request) {
                //Filter savedMusic berdasarkan title
                $query->where('title', 'like', '%'.$request->title.'%');
            })->latest()->paginate(10);
        } else {
            //get savedMusics
            $savedMusics = SavedMusic::with('music.album.artist')->where('user_id', auth()->user()->id)->latest()->paginate(10);
        }

        //return collection of savedMusics as a resource
        return new SavedMusicResource(true, 'List Data SavedMusic', $savedMusics);
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
            'music_id' => 'required|integer',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if music already saved
        $savedMusic = SavedMusic::where('user_id', auth()->user()->id)->where('music_id', $request->music_id)->first();

        //return error if music already saved
        if ($savedMusic) {
            return new SavedMusicResource(false, 'Music already saved!', null);
        }

        //create savedMusic
        $savedMusic = SavedMusic::create([
            'user_id' => auth()->user()->id,
            'music_id' => $request->music_id,
        ]);

        //return response
        return new SavedMusicResource(true, 'Music saved to your library!', $savedMusic);
    }

    /**
     * show
     *
     * @param  mixed $savedMusic
     * @return void
     */
    public function show(SavedMusic $savedMusic)
    {
        //return single savedMusic as a resource
        return new SavedMusicResource(true, 'SavedMusic Data Found!', $savedMusic->load('music.album.artist'));
    }

    /**
     * destroy
     *
     * @param  mixed $savedMusic
     * @return void
     */
    public function destroy(SavedMusic $savedMusic)
    {
        //soft delete savedMusic
        $savedMusic->delete();

        //return response
        return new SavedMusicResource(true, 'Music removed from your library!', null);
    }
}
