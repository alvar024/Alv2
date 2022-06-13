<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Spatie\Permission\Models\Role;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->order != '' ) {
            $data = Video::orderBy($request->order, $request->direction)->orderBy('updated_at', 'desc')->paginate(10);
        }else{
            $data = Video::orderBy('id', 'desc')->paginate(10);
        }
        return view('videos.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('videos.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $Video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $Video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $Video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $Video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $Video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $Video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $Video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $Video)
    {
        //
    }
}
