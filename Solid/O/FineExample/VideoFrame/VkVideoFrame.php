<?php

namespace ManaoDev\Lvlup\Solid\O\FineExample\VideoFrame;

class VkVideoFrame implements VideoFrameInterface
{

    public static function getFrame(string $videoUrl): string
    {
        $vkOid = substr($videoUrl, strlen("video-") +
            strpos($videoUrl, "video-"),
            (strlen($videoUrl) - strpos($videoUrl, "_")) * (-1));
        $vkId = substr($videoUrl, strpos($videoUrl, "_") + 1, strlen($videoUrl) - 1);

        return '<iframe src="https://vk.com/video_ext.php?oid=-' . $vkOid . '&id=' . $vkId . '&hd=2"
                allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0" 
                allowfullscreen width="400px" height="300px"></iframe>';
    }
}