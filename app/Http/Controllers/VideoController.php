<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;



class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  

        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'video' => 'required|file|mimetypes:video/mp4',
            ]);
    
            $path = $request->file('video')->store('videos', 'public');
    
            $video = Video::create([
                'title' => $request->title,
                'description' => $request->description,
                'path' => $path,
                'user_id' => auth()->id(),
            ]);
    
            return response()->json(['video' => $video], 201);
        }
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $video = Video::with('comments')->findOrFail($id);
    return response()->json(['video' => $video], 200);
} 


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
