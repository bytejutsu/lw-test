<?php

namespace App\Services\SharedStateService;

use Illuminate\Support\Facades\Cache;

class SharedStateService
{
    private static $instance;

    private static array $sharedData;
    private static string $cacheKey = 'shared_state_data';

    private function __construct($data)
    {

        if (!Cache::has(self::$cacheKey)) {
            Cache::put(self::$cacheKey, $data, 60); // Cache for 60 minutes
        }

        //$this->data = Cache::get(self::$cacheKey);

        self::$sharedData = Cache::get(self::$cacheKey);
    }


    /*
    private function __construct()
    {
        // Private constructor to prevent direct instantiation
        $this->sharedData = [];
    }
    */

    public static function getInstance($data = [])
    {
        if (!self::$instance) {
            self::$instance = new self($data);
        }

        return self::$instance;
    }

    public static function put($key, $value)
    {
        self::$sharedData[$key] = $value;
        Cache::put(self::$cacheKey, self::$sharedData, 60);
    }

    public static function append($key, $value)
    {
        self::$sharedData[$key][] = $value;
        Cache::put(self::$cacheKey, self::$sharedData, 60);
    }

    public static function get($key)
    {
        $result = Cache::get(self::$cacheKey);
        return $result[$key] ?? null;
    }

    public static function clear($key)
    {
        self::put($key, null);
    }

    public static function clearAll()
    {
        foreach (self::$sharedData as $key => $value)
        {
            self::clear($key);
        }
    }
}
