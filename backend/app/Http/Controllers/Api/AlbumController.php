<?php

namespace App\Http\Controllers\Api;

use App\Models\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AlbumResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get albums
        $albums = Album::latest()->paginate(5);

        //return collection of albums as a resource
        return new AlbumResource(true, 'List Data Album', $albums);
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
            'artist_id' => 'required|integer|exists:artists,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'year' => 'required|integer',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/albums', $image->hashName());

        //create album
        $album = Album::create([
            'artist_id' => $request->artist_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $image->hashName(),
            'description' => $request->description,
            'year' => $request->year,
        ]);

        //return response
        return new AlbumResource(true, 'Album Data succesfully added!', $album);
    }

    /**
     * show
     *
     * @param  mixed $album
     * @return void
     */
    public function show(Album $album)
    {
        //return single album as a resource
        return new AlbumResource(true, 'Album Data Found!', $album);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $album
     * @return void
     */
    public function update(Request $request, Album $album)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'artist_id' => 'integer|exists:artists,id',
            'title' => 'string|max:255',
            'slug' => 'string|max:255',
            'description' => 'string',
            'year' => 'integer',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('image')) {
            // define validation rules
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/albums', $image->hashName());

            //delete old image
            Storage::delete('public/albums/'.$album->image);

            //update album with new image
            $album->update([
                'artist_id' => ($request->artist_id) ? $request->artist_id : $album->artist_id,
                'title' => ($request->title) ? $request->title : $album->title,
                'slug' => ($request->slug) ? $request->slug : $album->slug,
                'image' => $image->hashName(),
                'description' => ($request->description) ? $request->description : $album->description,
                'year' => ($request->year) ? $request->year : $album->year,
            ]);

        } else {

            //update album without image
            $album->update([
                'artist_id' => ($request->artist_id) ? $request->artist_id : $album->artist_id,
                'title' => ($request->title) ? $request->title : $album->title,
                'slug' => ($request->slug) ? $request->slug : $album->slug,
                'description' => ($request->description) ? $request->description : $album->description,
                'year' => ($request->year) ? $request->year : $album->year,
            ]);
        }

        //return response
        return new AlbumResource(true, 'Album data updated!', $album);
    }

    /**
     * destroy
     *
     * @param  mixed $album
     * @return void
     */
    public function destroy(Album $album)
    {
        //delete image
        Storage::delete('public/albums/'.$album->image);

        //delete album
        $album->delete();

        //return response
        return new AlbumResource(true, 'Album data deleted!', null);
    }
}
