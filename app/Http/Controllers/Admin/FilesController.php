<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function createFile(Request $request)
    {
        $fileable_id = $request->fileable_id;
        $fileable_type = $request->fileable_type;
        $redirect_route = $request->redirect_route;
        return view('admin.upload-files.upload_file', compact('fileable_id', 'fileable_type', 'redirect_route'));
    }

    public function storeFile (Request $request, $id)
    {
        $this->validate($request, [
            'file' => 'required|file'
        ]);
        $fileAtributes = $request->file_atr;
        $fileOriginalName = $request->file('file')->getClientOriginalName();
        $fileAtributes['file'] = $request->file('file')->storeAs('uploads', $fileOriginalName, 'public');
        $fileAtributes['fileable_id'] = $id;
        $fileAtributes['fileable_type'] = $request->fileable_type;
        File::create($fileAtributes);
        return redirect($request->redirect_route)->with('flash_message', 'File added!');
    }

    public function delete (Request $request, $fileId)
    {
        $file = File::findOrFail($fileId);
        Storage::delete($file->file);
        $file->delete();
        return back()->with('flash_message', 'File deleted!');
    }
}
