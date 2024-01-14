<?php

namespace ManaoDev\Lvlup\Solid\O\FineExample\VideoFrame;

class RutubeVideoFrame implements VideoFrameInterface
{

    public static function getFrame(string $videoUrl): string
    {
        $rutubeId = substr($videoUrl, strpos($videoUrl, "video/") + 6, -1);
        return '<iframe src="https://rutube.ru/play/embed/' . $rutubeId . '" frameBorder="0" allow="clipboard-write;"
                allowFullScreen width="400px" height="300px"></iframe>';
    }
}