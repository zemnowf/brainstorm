<?php

require("../../../../config.php");

use ManaoDev\Lvlup\Solid\O\FineExample\VideoFrame\YoutubeVideoFrame;
use ManaoDev\Lvlup\Solid\O\FineExample\VideoFrame\VkVideoFrame;
use ManaoDev\Lvlup\Solid\O\FineExample\VideoFrame\RutubeVideoFrame;

$urlYt = "https://www.youtube.com/watch?v=dqLffnqnI0c";
$frameYt = YoutubeVideoFrame::getFrame($urlYt, "youtube");
echo $frameYt;

$urlVk = "https://vk.com/video-115218091_456239346";
$frameVk = VkVideoFrame::getFrame($urlVk, "vk");
echo $frameVk;

$urlRt = "https://rutube.ru/video/a13b0f0dd55935b899e9b476d00aca2e/";
$frameRt = RutubeVideoFrame::getFrame($urlRt, "rutube");
echo $frameRt;
