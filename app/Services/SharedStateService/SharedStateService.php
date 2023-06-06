<?php

namespace App\Services\SharedStateService;

use Illuminate\Support\Facades\Cache;

class SharedStateService
{
    private static $instance;

    private static array $sharedData;
    private static string $cacheKey = 'shared_state_data';
    private static int $duration = 120;

    private function __construct($data)
    {

        if (!Cache::has(self::$cacheKey)) {

             // Convert session duration from seconds to minutes

            Cache::put(self::$cacheKey, $data, self::$duration); // Cache for 60 minutes

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

    public static function getInstance($data = []) //maybe remove the option of passing an array because the array should guarantee integrity
    {
        if (!self::$instance) {
            self::$instance = new self($data);
        }

        return self::$instance;
    }

    private static function writeDataToCache($data = null): void
    {
        $data ? Cache::put(self::$cacheKey, $data, self::$duration) : Cache::put(self::$cacheKey, self::$sharedData, self::$duration);
    }

    private static function readDataFromCache() : array
    {
        self::$sharedData = Cache::get(self::$cacheKey);
        return self::$sharedData;
    }


    //for all the following functions: if the function writes => it should updateCache at end
    //                                 if the function reads => it should getCache at the beginning


    public static function exist($key) : bool
    {
        $cachedSharedData = self::readDataFromCache();

        //try to update the sharedData variable

        return array_key_exists($key, $cachedSharedData);
    }

    /**
     * @throws \Exception
     */
    private static function getStateSubjectInstance($key, $throwExceptionIfNotExist = true)
    {
        $cachedSharedData = self::readDataFromCache();

        if(self::exist($key))
        {
            return $cachedSharedData[$key];
        }

        if($throwExceptionIfNotExist)
        {
            throw new \Exception("StateSubject instance with key: ({$key}) doesn't exit");
        }

        return null;
    }

    private static function getState($key)
    {
        return self::getStateSubjectInstance($key)->getState();
    }

    public static function get($key)
    {
        return self::getState($key);
    }

    public static function put($key, $value)
    {
        self::$sharedData[$key] = new StateSubject($key, $value) ;

        self::writeDataToCache();
    }

    /**
     * @throws \Exception
     */
    public static function putIfNotExist($key, $value, $throwExceptionIfExist = true)
    {
        if(!self::exist($key))
        {
            self::$sharedData[$key] = new StateSubject($key, $value) ;
            self::writeDataToCache();
        }

        if($throwExceptionIfExist)
        {
            throw new \Exception("StateSubject instance with key: ({$key}) exits already");
        }

        return null;

    }

    /**
     * @throws \Exception
     */
    public static function update($key, $value)
    {

        self::put($key, $value);
        self::getStateSubjectInstance($key)->setState($value);

    }

    /**
     * @throws \Exception
     */
    public static function updateIfExists($key, $value)
    {
        if(self::exist($key))
        {
            self::update($key, $value);
        }
    }

    public static function append($key, $value)
    {
        $state = self::getState($key);

        if(is_array($state))
        {
            $newState[] = $value;
            self::put($key, $newState);
        }

    }

    public static function clear($key): void
    {
        self::put($key, null);
    }

    public static function clearAll(): void
    {
        foreach (self::$sharedData as $key => $value)
        {
            self::clear($key);
        }
    }

    public static function remove($key): void
    {
        unset(self::$sharedData[$key]);
        self::writeDataToCache();
    }

    public static function removeAll(): void
    {
        foreach (self::$sharedData as $key => $value)
        {
            self::remove($key);
        }
    }


}
