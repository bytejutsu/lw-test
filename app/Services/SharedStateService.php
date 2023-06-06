<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class SharedStateService
{
    //private static $instance;

    private array $sharedData;
    private static string $cacheKey = 'shared_state_data';

    public function __construct($data = [])
    {

        if (!Cache::has(self::$cacheKey)) {
            Cache::put(self::$cacheKey, $data, 60); // Cache for 60 minutes
        }

        $this->data = Cache::get(self::$cacheKey);

        $this->sharedData = Cache::get(self::$cacheKey);
    }


    /*
    private function __construct()
    {
        // Private constructor to prevent direct instantiation
        $this->sharedData = [];
    }
    */

    /*
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new SharedStateService();
        }

        return self::$instance;
    }

    */

    public function put($key, $value)
    {
        $this->sharedData[$key] = $value;
        Cache::put(self::$cacheKey, $this->sharedData, 60);
    }

    public function append($key, $value)
    {
        $this->sharedData[$key][] = $value;
        Cache::put(self::$cacheKey, $this->sharedData, 60);
    }

    public function get($key)
    {
        $result = Cache::get(self::$cacheKey);
        return $result[$key] ?? null;
    }

    public function clear($key)
    {
        $this->put($key, null);
    }

    public function clearAll()
    {
        foreach ($this->sharedData as $key => $value)
        {
            $this->clear($key);
        }
    }
}
