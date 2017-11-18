<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Parser extends Controller
{
    public function get_news()
    {
        $p = xml_parser_create();
        xml_parse_into_struct($p, $this->curling("https://lenta.ru/rss/articles"), $vals, $index);
        xml_parser_free($p);
        foreach ($vals as $data)
            if ($data['tag'] == 'GUID')
            {
                preg_match('/<div class="b-topic__header.*<\/div>/', $this->curling($data['value']), $out, PREG_OFFSET_CAPTURE);
                //preg_match('/<time class="g-date">.*<\/time>/', $out[0][0], $time, PREG_OFFSET_CAPTURE);
                //var_dump($time);
                DB::table('news')->insert(
                    [
                        'text' => $out[0][0],
                        //'created_at' => time(),
                    ]
                );
            }
    }
    public function curling($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        return curl_exec ($curl);
    }
}