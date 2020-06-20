<?php

namespace App\Http\Controllers;

use DataTables;
use App\Upload;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * get the dashboard
     */
    public function index()
    {
        return view('files.index');
    }

    /**
     * handle the uploaded file.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'bail|required|mimes:txt,doc,docx,pdf,png,jpeg,jpg,gif,zip|max:2000',
        ]);

        if ($request->file('file')->getClientOriginalExtension() == 'zip') {
            return redirect()->back()->withErrors(['The file must be a file of type: txt, doc, docx, pdf, png, jpeg, jpg, gif.']);
        }
        
        //$fileName = time().'.'.request()->file->getClientOriginalExtension();
        $fileName = request()->file->getClientOriginalName();

        if (request()->file->move(public_path('uploads'), $fileName)) {

            $upload = new Upload;
            $upload->name = $fileName;

            if ($upload->save()) {
                return redirect()->back()->with('success','File uploaded successfully.');
            } else {
                return redirect()->back()->withErrors(['File upload failed. Please refresh your page and try again.']);                
            }
        } else {
            return redirect()->back()->withErrors(['File upload failed. Please check your folder permissions.']);
        }
    }

    /**
     * get the files list
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Upload::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                          
                        $route = route('files.delete', $row->id );
   
                           $btn = '<a href="'. $route. '" class="edit btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('files.list', ['name' => 'Victoria']);
    }

    /**
     * delete the file by id
     */
    public function delete($id)
    {
        $deleted = Upload::find($id)->delete();
        return redirect()->back()->with('success','File deleted successfully.');
    }

    /**
     * get the uploaded files list
     */
    public function uploaded(Request $request)
    {
        if ($request->ajax()) {
            $data = Upload::latest()->withTrashed()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                          
                        $route = route('files.delete', $row->id );
   
                           $btn = '<a href="'. $route. '" class="edit btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('files.uploaded', ['name' => 'Victoria']);
    }


    /**
     * get the deleted files list
     */
    public function deleted(Request $request)
    {
        if ($request->ajax()) {
            $data = Upload::latest()->onlyTrashed()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                          
                        $route = route('files.delete', $row->id );
   
                           $btn = '<a href="'. $route. '" class="edit btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('files.deleted', ['name' => 'Victoria']);
    }
}