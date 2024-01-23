<?php

namespace App\Jobs;

use App\Models\Conversion;
use App\Models\Credit;
use App\Services\Api\SoundrawService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class SoundrawMusicComposeJob implements ShouldQueue
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
    public $timeout = 120; // Set the timeout duration in seconds

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
            $params = $this->params;
            $response = SoundrawService::sendRequest('', 'POST', $params);
            if ($response->status() === Response::HTTP_OK) {
                $m4aUrl = $response['m4a_url'];
                $uniqueFileName = uniqid('music_') . '.m4a';
                $destinationPath = 'uploads/musics/' . $uniqueFileName;

                // Upload the M4A file to Storage
                $m4aContent = file_get_contents($m4aUrl);
                Storage::disk('public')->put($destinationPath, $m4aContent);
                $this->conversion->music_path = $destinationPath;
                $this->conversion->save();
                $credit = Credit::where('user_id', auth()->user()->id)
                    ->where('amount', '>', 0)
                    ->first();
                $credit->amount = $credit->amount - 1;
                $credit->save();
            }
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            throw $e; // Re-throw the exception to let Laravel handle retries
        }
    }
}
