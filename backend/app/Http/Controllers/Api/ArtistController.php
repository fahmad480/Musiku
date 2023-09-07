<?php

namespace App\Http\Controllers\Api;

use App\Models\Artist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ArtistResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get artists
        $artists = Artist::latest()->paginate(5);

        //return collection of artists as a resource
        return new ArtistResource(true, 'List Data Artist', $artists);
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/artists', $image->hashName());

        //create artist
        $artist = Artist::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image->hashName(),
            'description' => $request->description,
        ]);

        //return response
        return new ArtistResource(true, 'Artist Data succesfully added!', $artist);
    }

    /**
     * show
     *
     * @param  mixed $artist
     * @return void
     */
    public function show(Artist $artist)
    {
        //return single artist as a resource
        return new ArtistResource(true, 'Artist Data Found!', $artist);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $artist
     * @return void
     */
    public function update(Request $request, Artist $artist)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'slug' => 'string|max:255',
            'description' => 'string',
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
            $image->storeAs('public/artists', $image->hashName());

            //delete old image
            Storage::delete('public/artists/'.$artist->image);

            //update artist with new image
            $artist->update([
                'name' => ($request->name == null) ? $artist->name : $request->name,
                'slug' => ($request->slug == null) ? $artist->slug : $request->slug,
                'image' => $image->hashName(),
                'description' => ($request->description == null) ? $artist->description : $request->description,
            ]);

        } else {

            //update artist without image
            $artist->update([
                'name' => ($request->name == null) ? $artist->name : $request->name,
                'slug' => ($request->slug == null) ? $artist->slug : $request->slug,
                'description' => ($request->description == null) ? $artist->description : $request->description,
            ]);
        }

        //return response
        return new ArtistResource(true, 'Artist data updated!', $artist);
    }

    /**
     * destroy
     *
     * @param  mixed $artist
     * @return void
     */
    public function destroy(Artist $artist)
    {
        //delete image
        Storage::delete('public/artists/'.$artist->image);

        //delete artist
        $artist->delete();

        //return response
        return new ArtistResource(true, 'Artist data deleted!', null);
    }
}
