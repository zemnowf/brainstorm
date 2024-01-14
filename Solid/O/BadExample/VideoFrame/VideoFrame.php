<?php

namespace ManaoDev\Lvlup\Solid\O\BadExample\VideoFrame;

class VideoFrame
{
    public static function getFrame(string $videoUrl, string $type): string
    {

        $frame = '';

        if ($type == "youtube") {
            parse_str(parse_url($videoUrl, PHP_URL_QUERY), $parameters);
            $youtubeId = $parameters['v'];

            $frame = '
                <iframe src="https://www.youtube.com/embed/' . $youtubeId . '" width="400px" height="300px"
                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;
                clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            ';
        }

        if ($type == "rutube") {
            $rutubeId = substr($videoUrl, strpos($videoUrl, "video/") + 6, -1);
            $frame = '
                <iframe src="https://rutube.ru/play/embed/' . $rutubeId . '" frameBorder="0" allow="clipboard-write;"
                allowFullScreen width="400px" height="300px"></iframe>
            ';
        }

        if ($type == "vk") {

            $vkOid = substr($videoUrl, strlen("video-") +
                strpos($videoUrl, "video-"),
                (strlen($videoUrl) - strpos($videoUrl, "_")) * (-1));
            $vkId = substr($videoUrl, strpos($videoUrl, "_") + 1, strlen($videoUrl) - 1);

            $frame = '
                <iframe src="https://vk.com/video_ext.php?oid=-' . $vkOid . '&id=' . $vkId . '&hd=2"
                allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0" 
                allowfullscreen width="400px" height="300px"></iframe>
            ';
        }

        return $frame;
    }

}