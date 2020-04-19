<?php

namespace Downloader;
class Downloader
{
    private $provider;

    public function __construct(ProviderAbstract $provider)
    {
        $this->provider = $provider;
    }

    public function download()
    {
        $context = stream_context_create();
        stream_context_set_params($context, ['notification' => [\Downloader\Downloader::class, 'streamCallback']]);
        $handler = @fopen($this->provider->getUrl(), 'r', false, $context);
        if (!$handler) {
            throw new \InvalidArgumentException("File not found");
        }
        file_put_contents($this->getProviderSafeFileName(), $handler);
    }

    private function getProviderSafeFileName()
    {
        // remove anything which isn't a word, whitespace, number or any of the following characters -_~,;[].
        $file = preg_replace("#([^\w\s\d\-_~,;\[\].])#i", '', $this->provider->getName());
        $file = preg_replace("#([\.]{2,})#i", '', $file); // remove any runs of periods
        $file = preg_replace("#([\s]){2,}#i", ' ', $file); // replace double space by single space
        return $file;
    }

    private function streamCallback($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max)
    {
        static $filesize = null;
        switch ($notification_code) {
            case STREAM_NOTIFY_RESOLVE:
            case STREAM_NOTIFY_AUTH_REQUIRED:
            case STREAM_NOTIFY_COMPLETED:
            case STREAM_NOTIFY_FAILURE:
            case STREAM_NOTIFY_AUTH_RESULT:
                break;
            case STREAM_NOTIFY_REDIRECTED:
                echo "Being redirected to: ", $message, "\n";
                break;
            case STREAM_NOTIFY_CONNECT:
                echo "Connected...\n";
                break;
            case STREAM_NOTIFY_FILE_SIZE_IS:
                $filesize = $bytes_max;
                echo "Filesize: ", $filesize, "\n";
                break;
            case STREAM_NOTIFY_MIME_TYPE_IS:
                echo "Mime-type: ", $message, "\n";
                break;
            case STREAM_NOTIFY_PROGRESS:
                if ($bytes_transferred > 0) {
                    if (!isset($filesize)) {
                        printf("\rUnknown filesize.. %2d mb done..", $bytes_transferred / 1024 / 1024);
                    } else {
                        $length = (int)(($bytes_transferred / $filesize) * 100);
                        printf("\r[%-100s] %d%% (%2d/%2d mb)", str_repeat("=", $length) . ">", $length, ($bytes_transferred / 1024 / 1024), $filesize / 1024 / 1024);
                    }
                }
                break;
        }
    }
}