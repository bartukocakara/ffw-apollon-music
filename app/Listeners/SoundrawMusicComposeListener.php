<?php

namespace App\Listeners;

use App\Jobs\SoundrawMusicComposeJob;
use App\Models\Conversion;

class SoundrawMusicComposeListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $conversion = $event->conversion;

        $soundDrawData = [
            'mood' => $event->params['body'], // Summarifydan gelcek
            'genres' => $conversion->genres, // [Rock, Jazz] kullanıcı seçicek
            'themes' => $conversion->themes, // Vlog kullanıcı seçicek
            'length' => $conversion->length, // kullanıcı seçicek
            'file_format' => ["m4a", "wav"],
            'mute_stems' => ["me", "bc"],
            'tempo' => $conversion->tempo, // kullanıcı seçicek
        ];
        SoundrawMusicComposeJob::dispatch($event->conversion, $soundDrawData);
    }
}
