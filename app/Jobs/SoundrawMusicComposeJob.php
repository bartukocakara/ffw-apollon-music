<?php

namespace App\Jobs;

use App\Models\Conversion;
use App\Models\Credit;
use App\Services\Api\SoundrawService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class SoundrawMusicComposeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Conversion $conversion;

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
    public function __construct(Conversion $conversion)
    {
        $this->conversion = $conversion;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::beginTransaction();

        try {

            $soundDrawData = [
                'mood' => $this->conversion->moods,
                'genres' => $this->conversion->genres,
                'themes' => $this->conversion->themes,
                'length' => $this->conversion->length,
                'file_format' => ["m4a", "wav"],
                'mute_stems' => ["me", "bc"],
                'tempo' => $this->conversion->tempo,
            ];

            $response = SoundrawService::sendRequest('', 'POST', $soundDrawData);

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

                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            if ($this->conversion->music_path && Storage::disk('public')->exists($this->conversion->music_path)) {
                Storage::disk('public')->delete($this->conversion->music_path);
            }
            Log::error($e->getMessage());
            sleep(30);
            SoundrawMusicComposeJob::dispatch($this->conversion);

        }
    }
}
