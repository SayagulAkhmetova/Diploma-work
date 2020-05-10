<?php

namespace App\Http\Controllers\API;

use App\Document;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{

    public function bookmarked(Request $request)
    {
        return User::find($request->userId)->bookedDocuments;
    }


    public function bookmark(Request $request)
    {
        User::find($request->userId)->bookedDocuments()->attach($request->documentId);
    }

    public function removeBookmark(Request $request)
    {
        if(User::find($request->userId)->bookedDocuments()->detach($request->documentId))
        return response()->json(['success' => true]);
    }



    public function rating()
    {
        $documents = Document::with(['user', 'category'])->orderBy('download_count', 'desc')->get();

        return response()->json(['documents' => $documents]);
    }


    public function download(Document $document)
    {
        $document->increment('download_count');
        $filename = public_path() . '/uploads/' . $document->link;
        return response()->download($filename);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return User::find($request->userId)->documents;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // naming collision todo
        $path = $request->document->storeAs('documents', $request->file('document')->getClientOriginalName());

        Document::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'link' => $path,
            'category_id' => $request->category,
        ]);

        return response()->json(['success' => true, 'message' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Document
     */
    public function show(Document $document)
    {
        return $document;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Document $document
     * @return void
     */
    public function update(Request $request, Document $document)
    {
        if ($request->hasFile('document')) {
            Storage::delete($document->link);
            $request->document->storeAs('documents', $request->file('document')->getClientOriginalName());
        }

        $document->name = $request->name;
        $document->description = $request->description;
        $document->category_id = $request->category;
        $document->save();
        return response()->json(['success' => true, 'message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @param Request $request
     * @return void
     */
    public function destroy(Document $document, Request $request)
    {
        $document = User::find($request->input('userId'))
            ->documents
            ->where('id', $document->id)
            ->first();

        Storage::delete($document->link);
        if($document->delete()) {
            return response()->json(['success' => true, 'message' => 'Success']);

        }
    }
}
