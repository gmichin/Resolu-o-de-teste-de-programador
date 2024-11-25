<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {   
        // larvel.log('aqui')
        return Notice::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        return Notice::create($validated);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'author' => 'sometimes|required|string|max:255',
        ]);

        $notice = Notice::findOrFail($id);
        $notice->update($validated);

        return response()->json($notice, 200);
    }

    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return response()->json(['message' => 'Notice deleted successfully'], 200);
    }
}
