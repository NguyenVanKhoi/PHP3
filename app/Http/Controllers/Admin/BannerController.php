<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::query()->get();
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'banner' => ['required'],
        ]);
        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('banner', 'public');
        }
        Banner::query()->create($data);
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banners = Banner::find($id);
        return view('admin.banner.edit', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banners = Banner::find($id);
        if ($request->hasFile('banner')) {
            if ($banners->banner) {
                Storage::disk('public')->delete($banners->banner);
            }
            $data['banner'] = $request->file('banner')->store('banner', 'public');
        } else {
            $data['banner'] = $banners->banner;
        }
        $banners->update($data);
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banners = Banner::find($id);
        if ($banners->banner) {
            Storage::disk('public')->delete($banners->banner);
        }
        $banners->delete();
        return back();
    }
}