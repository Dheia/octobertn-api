<?php
/**
 * Created by PhpStorm.
 * User: orkun.t
 * Date: 06-Nov-17
 * Time: 16:28
 */

namespace Mavitm\Restful\Classes;
use RainLab\Translate\Models\Message;



class Translate extends Message
{
    public static function getMine($messageId = null, $locale = null)
    {
        if (!self::$locale) {
            return $messageId;
        }

        if(empty($locale))
        {
            $locale = self::$locale;
        }

        $messageCode = self::makeMessageCode($messageId);

        /*
         * Found in cache
         */
//        if (array_key_exists($messageCode, self::$cache)) {
//            return self::$cache[$messageCode];
//        }

        /*
         * Uncached item
         */
        $item = self::firstOrNew([
            'code' => $messageCode
        ]);

        /*
         * Create a default entry
         */
        if (!$item->exists) {
            $data = [static::DEFAULT_LOCALE => $messageId];
            $item->message_data = $item->message_data ?: $data;
            $item->save();
        }

        /*
         * Schedule new cache and go
         */
        $msg = $item->forLocale($locale, $messageId);
        self::$cache[$messageCode] = $msg;
        self::$hasNew = true;

        return $msg;
    }

    public static function getTranslate($str, $locale = null)
    {
        return self::getMine($str, $locale);
    }
}