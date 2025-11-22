<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    //index
    public function index(Request $request)

    {
        //note by user_id
        $notes = Note::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->get();
        return response()->json($notes, 200);
    }

    //create
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);

        $note = new Note();
        $note->user_id = $request->user()->id;
        $note->title = $request->title;
        $note->note = $request->note;
        $note->save();

        return response()->json(['message' => 'Note created successfully'], 201);
    }


}
