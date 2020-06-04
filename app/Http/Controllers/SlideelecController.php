<?php

namespace App\Http\Controllers;

use App\Slideelec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideelecController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $sliderelect = Slideelec::paginate(6);

        return view('slideelect.index',compact('sliderelect'));
    }
    public function create()
    {

        return view('slideelect.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, Slideelec::$rules, Slideelec::$message);

        $slidefer = Slideelec::create($request->all());

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/sliderelectronica';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //se cactualiza registro en la tabla product_images
            if ($moved) {
                $slidefer->image = $fileName;
                $slidefer->save(); //se produce un update
            }
        }

        return redirect()->route('slideferelect')
            ->with('success', 'Slider creado con exito!');
    }
    public function show(Slideelec $slideelect)
    {

        return view('slideelect.show',compact('slideelect'));
    }
    public function edit(Slideelec $slideelect)
    {
        return view('slideelect.edit', compact('slideelect'));
    }
    public function update(Request $request, Slideelec $slideelect)
    {

        $slideelect->update($request->all());

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/sliderelectronica';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //se cactualiza registro en la tabla product_images
            if ($moved) {
                $previousPath = $path . '/' . $slideelect->image;
                $slideelect->image = $fileName;
                $saved = $slideelect->save(); //se produce un update

                if ($saved)
                    File::delete($previousPath);
            }
        }
        return redirect()->route('slideferelect')
            ->with('warning', 'Slider Actualizado con exito!');
    }
    public function destroy(Slideelec $slideelect)
    {
        $slideelect->delete();

        return redirect()->route('slideferelect')
            ->with('info', 'Slide Eliminado con exito!');
    }
}
