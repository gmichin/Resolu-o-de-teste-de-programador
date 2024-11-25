<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Notice;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return Notification::with('notice')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'notice_id' => 'required|exists:notices,id',
            'alias' => 'required|string|max:255',
        ]);

        return Notification::create($validated);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'notice_id' => 'sometimes|required|exists:notices,id',
            'alias' => 'sometimes|required|string|max:255',
        ]);

        $notification = Notification::findOrFail($id);
        $notification->update($validated);

        return response()->json($notification, 200);
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json(['message' => 'Notification deleted successfully'], 200);
    }

    public function getNotificationsByNotice($notice_id)
    {
        $notice = Notice::findOrFail($notice_id);
        $notifications = $notice->notifications;

        return response()->json($notifications, 200);
    }
}
