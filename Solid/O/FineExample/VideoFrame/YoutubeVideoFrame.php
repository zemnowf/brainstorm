<?php

namespace ManaoDev\Lvlup\Solid\O\FineExample\VideoFrame;

class YoutubeVideoFrame implements VideoFrameInterface
{

    public static function getFrame(string $videoUrl): string
    {
        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $parameters);
        $youtubeId = $parameters['v'];

        return '<iframe src="https://www.youtube.com/embed/' . $youtubeId . '" width="400px" height="300px"
            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;
            clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    }
}