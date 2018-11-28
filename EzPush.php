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
    public static $ServerAddress = "https://localhost/push/v1/";
    /**
     * @var string 存取權杖，可於推播伺服器產生
     */
    public static $ApiAccessKey = "ApiAccessKey";

    /**
     * 發送推播，請先建立一個 Message 物件來傳送
     * @param string $_bundleid
     * @param string $_subscriber
     * @param Message $_message
     * @return array 回傳陣列物件，或失敗為null
     */
    public static function Push($_message,$_subscriber,$_bundleid){
        $curl = new \Curl\Curl();
        $curl->setHeader("Authorization","Bearer ". EzPush::$ApiAccessKey);
        $curl->post(EzPush::$ServerAddress . "messages", [
                'bundleid' => $_bundleid,
                'subscriber' => $_subscriber,
                'payload' => $_message->toJson(),
            ]
        );
        if ($curl->error) {
            return null;
        }
        else {
            return json_decode($curl->response);
        }
    }
}
