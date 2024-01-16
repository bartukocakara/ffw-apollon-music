<?php

namespace App\Listeners;

use App\Jobs\SummarifyZeroShotJob;

class SummarifyZeroShotListener
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
        $params = $event->params;
        $categories = collect($params['tags'])->map(function ($data) {
            return $data['name'];
        });
        $summarifyData = [
            'body' => $params['caption_GPTS'],
            'categories' => implode(',', $categories->toArray()),
        ];
        SummarifyZeroShotJob::dispatch($event->conversion, $summarifyData);
    }
}
