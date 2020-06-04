<?php

namespace App\Http\Controllers;

use App\Slidefer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $sliderferrs = Slidefer::paginate(6);

        return view('slideferre.index', compact('sliderferrs'));
    }
    public function create()
    {

        return view('slideferre.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, Slidefer::$rules, Slidefer::$message);

        $slidefer = Slidefer::create($request->all());

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/sliderferreteria';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //se cactualiza registro en la tabla product_images
            if ($moved) {
                $slidefer->image = $fileName;
                $slidefer->save(); //se produce un update
            }
        }

        return redirect()->route('slideferreteria')
            ->with('success', 'Slider creado con exito!');
    }
    public function show(Slidefer $slidefer)
    {

        return view('slideferre.show',compact('slidefer'));
    }
    public function edit(Slidefer $slidefer)
    {
        return view('slideferre.edit',compact('slidefer'));
    }
    public function update(Request $request, Slidefer $slidefer)
    {

        $slidefer->update($request->all());

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/sliderferreteria';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //se cactualiza registro en la tabla product_images
            if ($moved) {
                $previousPath = $path . '/' . $slidefer->image;
                $slidefer->image = $fileName;
                $saved = $slidefer->save(); //se produce un update

                if ($saved)
                    File::delete($previousPath);
            }
        }
        return redirect()->route('slideferreteria')
            ->with('warning', 'Slider Actualizado con exito!');
    }
    public function destroy(Slidefer $slidefer)
    {
        $slidefer->delete();

        return redirect()->route('slideferreteria')
            ->with('info', 'Slide Eliminado con exito!');
    }
}
