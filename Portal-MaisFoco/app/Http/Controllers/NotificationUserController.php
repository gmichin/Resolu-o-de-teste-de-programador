<?php

namespace App\Http\Controllers;

use App\Models\NotificationUser;
use Illuminate\Http\Request;

class NotificationUserController extends Controller
{
    public function index()
    {
        return NotificationUser::with('notification')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'notification_id' => 'required|exists:notifications,id',
            'user_id' => 'required',
            'seen' => 'required|boolean',
            'date_seen' => 'nullable|date',
        ]);

        $notificationUser = NotificationUser::create([
            'notification_id' => $validated['notification_id'],
            'user_id' => $validated['user_id'],
            'seen' => $validated['seen'],
            'date_seen' => $validated['date_seen'] ?? null,
        ]);

        return response()->json($notificationUser, 201);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'notification_id' => 'sometimes|required|exists:notifications,id',
            'user_id' => 'required',
            'seen' => 'sometimes|required|boolean',
            'date_seen' => 'nullable|date',
        ]);

        $notificationUser = NotificationUser::findOrFail($id);
        $notificationUser->update($validated);

        return response()->json($notificationUser, 200);
    }

    public function destroy($id)
    {
        $notificationUser = NotificationUser::findOrFail($id);
        $notificationUser->delete();

        return response()->json(['message' => 'NotificationUser deleted successfully'], 200);
    }

    public function getByUser($user_id)
    {
        $notificationUsers = NotificationUser::where('user_id', $user_id)->get();

        return response()->json($notificationUsers, 200);
    }

    public function markAsSeen($id)
    {
        $notificationUser = NotificationUser::findOrFail($id);
        $notificationUser->update(['seen' => true, 'date_seen' => now()]);

        return response()->json(['message' => 'Notification marked as seen', 'notification_user' => $notificationUser], 200);
    }
}
