<?php

namespace Database\Factories;

use App\Enums\MusicTempoEnum;
use App\Models\Credit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conversion>
 */
class ConversionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::all()->pluck('id')),
            'status' => fake()->randomElement([0, 1]),
            'moods' => fake()->randomElement([['Epic', 'Happy'], ['Hopeful', 'Laid Black'], ['Angry', 'Sentimental'],
                                             ['Busy & Frantic'], ['Romantic', 'Funny & Weird'],
                                             ['Dark', 'Glamorous'], ['Mysterious', 'Elegant'], ['Dreamy', 'Euphric'],
                                             ['Fear', 'Heavy & Ponderous'], ['Peaceful', 'Restless'], ['Running', 'Sad'],
                                             ['Scary', 'Sexy'], ['Smooth', 'Suspense']]),
            'music_path' => 'uploads/musics/music_65a3f3620138d.m4a',
            'genres' => fake()->randomElement([['Acoustic', 'Hip Hop'], ['Beats', 'Pop'], ['Trap', 'Tokyo night pop'], ['Rock', 'Latin'],
                                                ['House', 'Tropical House'], ['Ambient', 'Orchestra'],
                                                ['Orchestra', 'Electro & Dance'], ['Electronica', 'Techno & Trance']]),
            'themes' => fake()->randomElement([['Ads & Trailers', 'Broadcasting'],
                ['Cinematic', 'Corporate'], ['Comedy', 'Cooking'], ['Documentary', 'Drama'],
                ['Fashion & Beauty', 'Gaming'], ['Holiday Season', 'Horror & Thriller'],
                ['Motivational & Inspiring', 'Nature'], ['Photography', 'Sports & Action'],
                ['Technology', 'Travel'], ['Tutorials', 'Vlogs'], ['Wedding & Romance', 'Workout & Wellness']
            ]),
            'length' => fake()->randomelement(['0:30', '1:00', '1:30', '2:00', '2:30', '3:00']), // Assuming length is in minutes
            'tempo' => fake()->randomElement([MusicTempoEnum::LOW->value,
                                                MusicTempoEnum::NORMAL->value,
                                                MusicTempoEnum::HIGH->value]),
        ];
    }
}
