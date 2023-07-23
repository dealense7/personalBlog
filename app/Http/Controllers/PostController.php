<?php

namespace App\Http\Controllers;

use App\Contracts\Services\PostServiceContract;
use App\Http\Requests\PostSaveRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(): View
    {
        return view('dashboard.create.create');
    }

    public function store(
        PostSaveRequest     $request,
        PostServiceContract $service
    ): RedirectResponse
    {
        $data = $request->validated();

        $service->create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
