<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleMeetController extends Controller
{
    public function create(Lesson $lesson)
    {
        session(['google_meet_lesson_id' => $lesson->id]);

        return Socialite::driver('google')
            ->scopes(['https://www.googleapis.com/auth/calendar.events'])
            ->with(['access_type' => 'offline', 'prompt' => 'consent select_account'])
            ->redirect();
    }

    public function store()
    {
        $user = Socialite::driver('google')->user();
        
        $lessonId = session('google_meet_lesson_id');
        if (! $lessonId) {
            return redirect()->route('dashboard');
        }

        $lesson = Lesson::findOrFail($lessonId);

        $client = new Client();
        $client->setAccessToken($user->token);

        $service = new Calendar($client);

        $event = new Event([
            'summary' => $lesson->title ?? 'Lesson',
            'description' => $lesson->description ?? 'Lesson via Smart',
            'start' => [
                'dateTime' => \Carbon\Carbon::parse($lesson->available_at)->toRfc3339String(),
                'timeZone' => 'Europe/London', // Should probably config this
            ],
            'end' => [
                'dateTime' => \Carbon\Carbon::parse($lesson->available_at)->addHour()->toRfc3339String(),
                'timeZone' => 'Europe/London',
            ],
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => 'sample' . time(),
                    'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                ],
            ],
        ]);

        $calendarId = 'primary';
        $event = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);

        $lesson->update([
            'google_meet_link' => $event->hangoutLink,
        ]);

        return redirect()->route('months.show', $lesson->month);
    }
}
