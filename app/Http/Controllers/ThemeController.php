<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('themeAdmin');
    }

    public function index()
    {
        $themes = Theme::all();
        return view('admin.themes.index', compact('themes'));
    }

    public function create()
    {
        $theme = new Theme();
        return view('admin.themes.create', compact('theme'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cdn_url' => 'required'
        ]);

        $theme = new Theme([
            'name' => $request->input('name'),
            'cdn_url' => $request->input('cdn_url'),
            'created_by' => auth()->user()->id
        ]);

        $theme->save();

        return redirect('/admin/themes');
    }

    public function show(Theme $theme)
    {
        return view ('admin.themes.show', compact('theme'));
    }

    public function edit(Theme $theme)
    {
        return view ('admin.themes.edit', compact('theme'));
    }

    public function update(Request $request, Theme $theme)
    {
        $this->validate($request, [
            'name' => 'required',
            'cdn_url' => 'required'
        ]);

        $theme->update([
            'name' => $request->input('name'),
            'cdn_url' => $request->input('cdn_url'),
            'updated_by' => auth()->user()->id
        ]);

        $theme->save();

        return redirect('/admin/themes');
    }

    public function destroy(Theme $theme)
    {
        if($theme->delete()) {
            $theme->update([
                'deleted_by' => Auth::user()->id,
            ]);
        }
        $theme->delete();
        return redirect('/admin/themes');
    }
}
