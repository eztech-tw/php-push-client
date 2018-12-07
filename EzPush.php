<?php

namespace eztechtw\ezpush;

/**
 * 協助送出推播訊息之輔助類別
 */
class EzPush
{
    /**
     * @var string 推播伺服器位址
     */
    public static $ServerAddress = "https://localhost/push/";
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
        $curl->post(EzPush::$ServerAddress . "v1/messages", [
                'bundleid' => $_bundleid,
                'subscriber' => $_subscriber,
                'payload' => $_message->toJson(),
            ]
        );
        if ($curl->error) {
            return null;
        }
        else {
            return json_decode($curl->response, true);
        }
    }

    /**
     * 取得 Bundleid 列表，伺服器無法連線將回傳null
     * ["Bundleid"=>"說明"]
     * @return array
     */
    public static function BundleidList(){
        $curl = new \Curl\Curl();
        $curl->setHeader("Authorization","Bearer ". EzPush::$ApiAccessKey);
        $curl->get(EzPush::$ServerAddress . "v1/bundleids");
        if ($curl->error) {
            return null;
        }
        else {
            $bids = json_decode($curl->response, true);
            $bid_out = [];
            foreach ($bids as $bid){
                $bid_out[$bid['bundleid']] = $bid['description'];
            }
            return $bid_out;
        }
    }

    /**
 * 上傳使用者Token
 * @param string $_bundleid
 * @param string $_subscriber
 * @param string $_token
 * @param string $_platform
 * @return array 回傳陣列物件，或失敗為null
 */
    public static function addClientToken($_token,$_subscriber,$_bundleid,$_platform){
        $curl = new \Curl\Curl();
        $curl->setHeader("Authorization","Bearer ". EzPush::$ApiAccessKey);
        $curl->post(EzPush::$ServerAddress . "v1/client-tokens", [
                'bundleid' => $_bundleid,
                'subscriber' => $_subscriber,
                'token' => $_token,
                'platform' => $_platform,
            ]
        );
        if ($curl->error) {
            return null;
        }
        else {
            return json_decode($curl->response, true);
        }
    }

    /**
     * 全部標示已讀
     * @param string $_bundleid
     * @param string $_subscriber
     * @return array 回傳陣列物件，或失敗為null
     */
    public static function markAllAsRead($_subscriber,$_bundleid){
        $curl = new \Curl\Curl();
        $curl->setHeader("Authorization","Bearer ". EzPush::$ApiAccessKey);
        $curl->patch(EzPush::$ServerAddress . "v1/messages", [
                'filter[bundleid]' => $_bundleid,
                'filter[subscriber]' => $_subscriber,
            ]
        );
        if ($curl->error) {
            return null;
        }
        else {
            return json_decode($curl->response, true);
        }
    }
}
