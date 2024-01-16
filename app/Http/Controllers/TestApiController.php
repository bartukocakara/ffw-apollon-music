<?php

namespace App\Http\Controllers;

use App\Enums\MusicTempoEnum;
use App\Models\Conversion;
use App\Services\Api\AsticaService;
use App\Services\Api\SoundrawService;
use App\Services\Api\SummarifyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestApiController extends Controller
{
    public function index()
    {
        $originalImagePath = public_path('test-files/matrix.jpg');

        // Generate a unique file name
        $uniqueFileName = uniqid('image_') . '.jpg';

        // Path to save the image in the uploads directory
        $destinationPath = 'uploads/img/' . $uniqueFileName;

        // Save the image to storage
        Storage::disk('public')->put($destinationPath, file_get_contents($originalImagePath));

        // Get the image content as base64
        $imageBase64 = base64_encode(file_get_contents($originalImagePath));

        $params = [
            'user_id' => '00acbc94-332b-4d51-89d8-ae58b1f3e686',
            'image_path' => $uniqueFileName,
            'genres' => ["Rock", "Acoustic"],
            'themes' => "Vlogs",
            'length' => 30,
            'tempo' => MusicTempoEnum::LOW->value
        ];

        // Create the Conversion
        $conversion = Conversion::create($params);

        // Use the base64-encoded image content in the Astica API request
        $asticaData = [
            'input' => $imageBase64,
            'visionParams' => "gpt, describe, describe_all, tags, objects",
            'modelVersion' => "2.1_full",
            'gpt_prompt' => "",
            'gpt_length' => "90",
        ];

        # Astica Servisine parametre gönder

        // Send the request to Astica API
        $asticaService = AsticaService::sendRequest('', 'POST', $asticaData);

        # $asticaResponse Gelen response caption  parametrelerini al
        $asticaCaption = $asticaService->json()['caption_GPTS'];
        $categories = collect($asticaService->json()['tags'])->map(function ($data) {
            return $data['name'];
        });


        #https://docs.google.com/document/d/185WjC7T1Rq1-9zKlARobmeFiR3VaJcN1IT4ZwDP03Tg/edit
        # Summarify Servisine asticadan gelen response body bilgilerini gönder
        $summarifyData = [
            'body' => $asticaCaption,
            'categories' => implode(',', $categories->toArray()),
        ];
        $summarify = SummarifyService::sendRequest('/zero-shot', 'POST', $summarifyData);
        #MOOD 'Angry, Busy & Frantic, Dark, Dreamy, Elegant, Epic, Euphoric, Fear, Funny & Weird, Glamorous, Happy, Heavy & Ponderous, Hopeful, Laid Back, Mysterious, Peaceful, Restless, Romantic, Running, Sad, Scary, Sentimental, Sexy, Smooth, Suspense';
        $mood = $summarify->json()['body'];

        #GENRES Acoustic, Hip Hop, Beats, Funk, Pop, Drum n Bass, Trap, Tokyo night pop, Rock, Latin, House, Tropical House, Ambient, Orchestra, Electro & Dance, Electronica, Techno & Trance, Jersey Club, Drill, R&B, Lofi Hip Hop, World, Afrobeats, Christmas

        $categories = collect($asticaService->json()['tags'])->map(function ($data) {
            return $data['name'];
        });
        # $summarifyResponse Gelen response evaluation parametrelerini al
        $soundDrawData = [
            'mood' => $mood, // Summarifydan gelcek
            'genres' => ["Rock", "Acoustic"], // kullanıcı seçicek
            'themes' => "Vlogs", // kullanıcı seçicek
            'length' => 30, // kullanıcı seçicek
            'file_format' => ["m4a", "wav"],
            'mute_stems' => ["me", "bc"],
            'tempo' => ["low", "high"], // kullanıcı seçicek
        ];

        $soundrawResponse = SoundrawService::sendRequest('', 'POST', $soundDrawData);
        $soundrawResponseData = $soundrawResponse->json();
        // Extract relevant information from the Soundraw response
        $m4aUrl = $soundrawResponseData['m4a_url'];

        // Upload the M4A file to Storage
        $m4aContent = file_get_contents($m4aUrl);
        Storage::disk('public')->put('uploads/musics/soundraw_output.m4a', $m4aContent);
        dd(true);
        # gelen dosyayla music adı oluştur ve public musics dosyasına taşı
        # music path ile conversion update et

    }
}
