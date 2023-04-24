<?php

namespace allen\dlsite;

class Dlsite {
  public static function getWorkDetails($work_id) {
    $url = 'https://www.dlsite.com/maniax/work/=/product_id/' . $work_id . '.html';
    $html = file_get_contents($url);

    // 获取指定元素
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    $work_name = $xpath->query('//h1[@class="work_name"]/text()')->item(0)->nodeValue;
    $details = $xpath->query('//div[@class="work_story"]/p/text()')->item(0)->nodeValue;

    return array("work_name" => $work_name, "details" => $details);
  }
}
