<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Crm\Customer\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotesController extends Controller
{
    public function index($customer_id)
    {
        return Note::where('customer_id', $customer_id)->get();
    }


    public function show($customer_id)
    {
        return Note::find($customer_id) ?? response()->json(['status' => 'NOT FOUND'], Response::HTTP_NOT_FOUND);
    }


    public function create(Request $request, $customer_id)
    {
        $note = new Note();
        $note->note = $request->get('note');
        $note->customer_id = $customer_id;

        $note->save();

        return $note;
    }



    public function update(Request $request, $customer_id, $id)
    {
        $note = Note::where('customer_id', $customer_id)->get();
        if(!$note) {
            return response()->json(['status' => 'NOT FOUND'], Response::HTTP_NOT_FOUND);
        }

        if ($note->customer_id !== $customer_id) {
            return response()->json(['status' => 'Invalid Customer'], Response::HTTP_BAD_REQUEST);
        }
        $note->note = $request->get('note');
        $note->save();

        return $note;

    }

    public function delete(Request $request, $customer_id, $id)
    {
        $note = Note::find($id);
        if(!$note) {
            return response()->json(['status' => 'NOT FOUND'], Response::HTTP_NOT_FOUND);
        }

        if ($note->customer_id != $customer_id) {
            return response()->json(['status' => 'Invalid Customer'], Response::HTTP_BAD_REQUEST);
        }
        $note->delete();

        return response()->json(['status' => 'DELETEd'], Response::HTTP_OK);
    }
}
