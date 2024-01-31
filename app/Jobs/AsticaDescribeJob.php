<?php

namespace App\Jobs;

use App\Events\SummarifyZeroShotEvent;
use App\Models\Conversion;
use App\Services\Api\AsticaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;

class AsticaDescribeJob implements ShouldQueue
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
    public $timeout = 120; // Increase the timeout duration in seconds

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
            $asticaData = [
                'input' => $this->params['image_base64'],
                'visionParams' => "gpt, describe, describe_all, tags, objects",
                'modelVersion' => "2.1_full",
                'gpt_prompt' => "",
                'gpt_length' => "90",
            ];
            $response = AsticaService::sendRequest('', 'POST', $asticaData);

            if ($response->status() === Response::HTTP_OK) {
                $this->conversion->save();
                SummarifyZeroShotEvent::dispatch($this->conversion, $response->json());
            }
        } catch (\Exception $e) {
            if ($this->attempts() < $this->tries && $this->isTimeoutException($e)) {
                // Retry the job if it's a timeout exception
                throw $e;
            }

            // Log the exception or handle it as needed
        }
    }

    /**
     * Check if the exception is a cURL timeout exception.
     *
     * @param \Exception $e
     * @return bool
     */
    private function isTimeoutException(\Exception $e): bool
    {
        return $e instanceof \Illuminate\Http\Client\ConnectionException &&
            strpos($e->getMessage(), 'Operation timed out') !== false;
    }
}
