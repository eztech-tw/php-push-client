<?php

namespace eztechtw\ezpush;

/**
 * 推播訊息之輔助類別
 */
class Message
{
    /**
     * @var string 標題
     */
    public $title = "";
    /**
     * @var string 內文
     */
    public $body = "";

    /**
     * @var int 未讀數量
     */
    public $badge = null;

    /**
     * @var array 額外payload資訊，以巢狀陣列(物件)傳入，如
     *  [
     *      "priority" => "normal",
     *      "data" => [
     *          "volume"  => "3.21.15",
     *          "contents"  => "http://www.news-magazine.com/world-week/21659772"
     *      ],
     *      "aps" => [
     *           "sound" => "bingbong.aiff"
     *      ]
     *  ]
     */
    public $extra = [];

    /**
     *  轉換payload資料為伺服器json
     * @return string JSON資料
     */
    public function toJson(){
        if(isset($this->badge)){
            $this->extra['badge'] = $this->badge;
        }
        $payload = [
            'title'=>$this->title,
            'body'=>$this->body,
            'extra'=>$this->extra
        ];
        $payload = json_encode($payload);
        return $payload;
    }
}
