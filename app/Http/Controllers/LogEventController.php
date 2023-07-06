<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogEvent;
use Illuminate\Support\Facades\Validator;

class LogEventController extends Controller
{
    public function saveEvent(Request $request) {

        // валидация
        $validator = Validator::make($request->server(), [
            'HTTP_USER_AGENT' => 'required|string',
            'REMOTE_ADDR' => 'required|ip',
        ]);

        if ($validator->fails()) {
            return response('Validation error', 400);
        }

        // запись в лог-файл
        try {
            file_put_contents(
                storage_path('logs/events.log'),
                date('Y-m-d H:i:s.u', time()) . ' ' . $request->ip() . ' ' . $request->userAgent() . PHP_EOL,
                FILE_APPEND
            );
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }

        // запись в БД
        try {
            $newEvent = LogEvent::create([
                'timestamp' => date('Y-m-d H:i:s.u', time()),
                'user_ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }

        return response($newEvent, 201);
    }

    public function getEventsDB() {
        try {
            $events = LogEvent::all();
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }

        return response()->json($events, 200);
    }

    public function getEventsFile() {
        try {
            $events = file_get_contents(storage_path('logs/events.log'));
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }

        return response()->json($events, 200);
    }
}
