# PHP Youtube Downloader

Command line to download Youtube videos

## Installation

First clone the project
```bash
git clone https://github.com/smoqadam/php-youtube-downloader && cd php-youtube-downloader
```
then 
```
composer install
```

### Usage

```bash
$ php index.php dl https://www.youtube.com/watch?v=arj7oStGLkU

Video formats
1: video/mp4; codecs="avc1.4d401f" - 84967445
2: video/webm; codecs="vp9" - 30060870
3: video/mp4; codecs="av01.0.05M.08" - 45430946
4: video/mp4; codecs="avc1.4d401e" - 38379543
5: video/webm; codecs="vp9" - 17852372
6: video/mp4; codecs="av01.0.04M.08" - 22125926
7: video/mp4; codecs="avc1.4d401e" - 18947658
8: video/webm; codecs="vp9" - 13016828
9: video/mp4; codecs="av01.0.01M.08" - 13487373
10: video/mp4; codecs="avc1.4d4015" - 12241066
11: video/webm; codecs="vp9" - 8548007
12: video/mp4; codecs="av01.0.00M.08" - 7881960
13: video/mp4; codecs="avc1.4d400c" - 5685370
14: video/webm; codecs="vp9" - 8179760
15: video/mp4; codecs="av01.0.00M.08" - 6194813
16: audio/mp4; codecs="mp4a.40.2" - 13656178
17: audio/webm; codecs="opus" - 5254155
18: audio/webm; codecs="opus" - 6733931
19: audio/webm; codecs="opus" - 13020614
Which format do you want to download? (default: 1):2
Connected...
Mime-type: video/webm
Filesize: 30060870
[======>                                                                                             ] 6% ( 1/28 mb)^C
```

