<?php

use Downloader\Commands\Download;
use Symfony\Component\Console\Application;

require_once 'vendor/autoload.php';
$cmd = new Download();
$app = new Application();
$app->add($cmd);
$app->run();


//$video = new Video('BclvAM2mUyo');
//$formats = $video->getFormats();
///** @var Format $format */
//
//foreach ($formats as $index=>$format) {
//    printf("\n%d: %s - %dMB ", ($index+1), $format->getMimeType(), $format->getSize()/1024/1024);
//}
//echo "\n";
//$i = readline("\nPlease enter a number: ");
//echo $i;
//$format = $formats[$i-1];
//$url=$format->getUrl();
//// $url = 'http://dl.myiranmelodys.ir/IranMelody/Archive/E/Ebi/Ebi%20-%20Shabzadeh/05%20Khorjin.mp3';
//function stream_notification_callback($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max) {
//    static $filesize = null;
//
//    switch($notification_code) {
//    case STREAM_NOTIFY_RESOLVE:
//    case STREAM_NOTIFY_AUTH_REQUIRED:
//    case STREAM_NOTIFY_COMPLETED:
//    case STREAM_NOTIFY_FAILURE:
//    case STREAM_NOTIFY_AUTH_RESULT:
//        /* Ignore */
//        break;
//
//    case STREAM_NOTIFY_REDIRECTED:
//        echo "Being redirected to: ", $message, "\n";
//        break;
//
//    case STREAM_NOTIFY_CONNECT:
//        echo "Connected...\n";
//        break;
//
//    case STREAM_NOTIFY_FILE_SIZE_IS:
//        $filesize = $bytes_max;
//        echo "Filesize: ", $filesize, "\n";
//        break;
//
//    case STREAM_NOTIFY_MIME_TYPE_IS:
//        echo "Mime-type: ", $message, "\n";
//        break;
//
//    case STREAM_NOTIFY_PROGRESS:
//        if ($bytes_transferred > 0) {
//            if (!isset($filesize)) {
//                printf("\rUnknown filesize.. %2d mb done..", $bytes_transferred/1024/1024);
//            } else {
//                $length = (int)(($bytes_transferred/$filesize)*100);
//                printf("\r[%-100s] %d%% (%2d/%2d mb)", str_repeat("=", $length). ">", $length, ($bytes_transferred/1024/1024), $filesize/1024/1024);
//            }
//        }
//        break;
//    }
//}
//
//$context = stream_context_create();
//stream_context_set_params($context, [
//    'notification' => 'stream_notification_callback'
//]);
//
//$out = fopen($url , 'r', false, $context);
//
//file_put_contents($video->getDetails()->getTitle(), $out);
