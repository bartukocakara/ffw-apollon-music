<?php

namespace App\Jobs;

use App\Events\SoundrawMusicComposeEvent;
use App\Models\Conversion;
use App\Services\Api\SummarifyService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;

class SummarifyZeroShotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Conversion $conversion;
    public array $params;

    /**
     * The maximum number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3; // Set the number of retry attempts

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 60; // Set the timeout duration in seconds

    /**
     * Create a new job instance.
     */
    public function __construct(Conversion $conversion, array $params)
    {
        $this->conversion = $conversion;
        $this->params = $params;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $response = SummarifyService::sendRequest('/zero-shot', 'POST', $this->params);

            if ($response->status() === Response::HTTP_OK) {
                SoundrawMusicComposeEvent::dispatch($this->conversion, $this->params);
            }
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            throw $e; // Re-throw the exception to let Laravel handle retries
        }
    }
}
