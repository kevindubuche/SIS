<?php

namespace App\Https\Controllers;

use Illuminate\Https\Request;

use Youtube;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Https\Response
     */
    public function index()
    {
        
    return view('video');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Https\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Https\Request  $request
     * @return \Illuminate\Https\Response
     */
    public function store(Request $request)
    {
        $video = Youtube::upload($request->file('video')->getPathName(), [
            'title'       => $request->input('title'),
            'description' => $request->input('description')
        ]);
        // dd($video);
        return "Video uploaded successfully. Video ID is ". $video->getVideoId();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Https\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Https\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Https\Request  $request
     * @param  int  $id
     * @return \Illuminate\Https\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
