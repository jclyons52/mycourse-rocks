<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use Illuminate\Support\Facades\Queue;
use Request;
use App\Commands\GenerateThumbnailCommand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileEntryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $entries = Fileentry::all();

        return view('admin.fileentries.index', compact('entries'));
    }

    public function add() {

        $file = Request::file('file');
        $extension = $file->getClientOriginalExtension();

        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;

        $entry->save();

//        if($extension == 'pdf'){
//            Queue::push( new GenerateThumbnailCommand($entry));
//        }

        return redirect('fileentry');

    }

    public function show($filename){

        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }

}

