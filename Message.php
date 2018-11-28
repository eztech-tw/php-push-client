<?php

namespace scott1984\ezpush;

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
}
