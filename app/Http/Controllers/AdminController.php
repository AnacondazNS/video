<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function videos()
    {
        $videos= Viddeo::all();
        return view('admin.videos', compact('videos'));
    }

    public function restrictVideo($id)
    {
        $video = Video::findOrFail($id);
        $video->update(['restricted' => true]);
        return redirect()->back();
    }
}
