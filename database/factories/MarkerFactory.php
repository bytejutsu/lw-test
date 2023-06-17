<?php

namespace Database\Factories;

use App\Models\Marker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marker>
 */
class MarkerFactory extends Factory
{
    protected $model = Marker::class;

    //static geographical values of the box boundary of Tunisia

    private static $minLat = 30.2; // southernmost point in Tunisia
    private static $maxLat = 37.7; // northernmost point in Tunisia
    private static $minLong = 7.5; // westernmost point in Tunisia
    private static $maxLong = 11.6; // easternmost point in Tunisia


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // generate random coordinates within Tunisia
        $lat = mt_rand(self::$minLat * 10**8, self::$maxLat * 10**8) / 10**8;
        $long = mt_rand(self::$minLong * 10**8, self::$maxLong * 10**8) / 10**8;


        return [
            'lat' => $lat,
            'long' => $long,
        ];
    }
}
