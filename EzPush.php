<?php

namespace scott1984\ezpush;

/**
 * 協助送出推播訊息之輔助類別
 */
class EzPush
{
    /**
     * @var string 推播伺服器位址
     */
    public static $ServerAddress = "https://example.com/push/v1/";
    /**
     * @var string 存取權杖，可於推播伺服器產生
     */
    public static $ApiAccessKey = "ApiAccessKey";

    /**
     * 發送推播，請先建立一個 Message 物件來傳送
     * @param string $_bundleid
     * @param string $_subscriber
     * @param Message $_message
     */
    public static function Push($_message,$_subscriber,$_bundleid){

    }
}
