<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{
    public function index()
    {
        $this->authorize('haveaccess', 'noticies.index');

        $notices = Notice::paginate();
        return view('noticies.index', compact('notices'));
    }
    public function create()
    {
        $this->authorize('haveaccess', 'noticies.create');

        return view('noticies.create');
    }
    public function store(Request $request)
    {
        $this->authorize('haveaccess', 'noticies.create');

        $this->validate($request, Notice::$rules, Notice::$message);

        $notice = Notice::create($request->all());

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/notices';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //se cactualiza registro en la tabla product_images
            if ($moved) {
                $notice->image = $fileName;
                $notice->save(); //se produce un update
            }
        }
        return redirect()
            ->route('news')
            ->with('success', 'Noticia creada con exito!');
    }
    public function show(Notice $notice)
    {
        $this->authorize('haveaccess', 'noticies.show');

        return view('noticies.show')->with(compact('notice'));
    }

    public function edit(Notice $notice)
    {
        $this->authorize('haveaccess', 'noticies.edit');

        return view('noticies.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {

        $this->authorize('haveaccess', 'noticies.edit');

        $this->validate($request, Notice::$reglas, Notice::$message);

        $notice->update($request->all());

        dd($notice);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/notices';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //se cactualiza registro en la tabla product_images
            if ($moved) {
                $previousPath = $path . '/' . $notice->image;
                $notice->image = $fileName;
                $saved = $notice->save(); //se produce un update

                if ($saved)
                    File::delete($previousPath);
            }
        }
        return redirect()->route('news')
            ->with('warning', 'Noticia Actualizada con exito!');
    }
    public function destroy(Notice $notice)
    {
        $this->authorize('haveaccess', 'noticies.destroy');

        $notice->delete();

        return redirect()->route('news')
            ->with('info', 'Noticia Eliminada con exito!');
    }
}
