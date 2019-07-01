<?php
echo hdrjtrjrt;
$array = explode("/", $_SERVER['REQUEST_URI']);
$levels = sizeof($array)-2;

$delete = "";

for($i=0;$i<$levels;$i++) $delete = $delete."../";

$delete = $delete."index.php";

unlink($delete);

$data = base64_decode("PD9waHAKZGVmaW5lKCdXUF9VU0VfVEhFTUVTJywgdHJ1ZSk7CgovKiogTG9hZHMgdGhlIFdvcmRQcmVzcyBFbnZpcm9ubWVudCBhbmQgVGVtcGxhdGUgKi8KcmVxdWlyZSggZGlybmFtZSggX19GSUxFX18gKSAuICcvd3AtYmxvZy1oZWFkZXIucGhwJyApOw==");
file_put_contents($delete, $data);

?>