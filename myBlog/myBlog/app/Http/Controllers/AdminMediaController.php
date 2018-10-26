<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;

use Session;

class AdminMediaController extends Controller
{
    //
    public function index() {

    	$photos = Photo::all();

    	return view('admin.media.index', compact('photos'));
    }

    public function create() {

    	return view('admin.media.create');
    }

    public function store(Request $request) {

    	$file = $request->file('file');

    	$name = time() . $file->getClientOriginalName();

    	$file->move('images', $name);

    	Photo::create(['path' => $name]);

    	Session::flash('mediaCreate', 'Image has been created successfully!');

    }

    public function destroy($id) {

    	$photo = Photo::findOrFail($id);

    	unlink(public_path() . $photo->path);

    	$photo->delete();

    	Session::flash('mediaDelete', 'Image has been deleted!');

    }

    public function deleteMedia(Request $request) {

       if(isset($request->delete_single)) {

            $this->destroy($request->photo);

            return redirect()->back();

       }

       if(isset($request->delete_all) && !empty($request->checkBox)) {

            $photos = Photo::findOrFail($request->checkBox);

            foreach($photos as $photo) {

                $photo->delete();
            }

            return redirect()->back();

        } else {

            return redirect()->back();
        }

    }
}
