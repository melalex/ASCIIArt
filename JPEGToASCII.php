<?php
/**
 * Created by PhpStorm.
 * User: melalex
 * Date: 7/14/16
 * Time: 6:17 PM
 */

$image = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);
$imageLength = imagesx($image);
$imageHeight = imagesy($image);


for ($i = 0; $i < $imageHeight; $i++)
{

    for ($j = 0; $j < $imageLength; $j++)
    {
        $rgb = imagecolorat($image, $j, $i);

        $red = ($rgb >> 16) & 0xFF;
        $green = ($rgb >> 8) & 0xFF;
        $blue = $rgb & 0xFF;

        $brightness = round(0.3 * $red + 0.59 * $green + 0.11 * $blue);

        switch (true) {
            case $brightness < 25:
                echo "'";
                break;

            case $brightness < 50:
                echo ".";
                break;

            case $brightness < 75:
                echo "^";
                break;

            case $brightness < 100:
                echo "_";
                break;

            case $brightness < 125:
                echo "*";
                break;

            case $brightness < 150:
                echo "?";
                break;

            case $brightness < 175:
                echo "/";
                break;

            case $brightness < 200:
                echo "%";
                break;

            case $brightness < 225:
                echo "&";
                break;

            case $brightness < 250:
                echo "#";
                break;

            default:
                echo "@";
        }
    }

    echo "\n";
}
