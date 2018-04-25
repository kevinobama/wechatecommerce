<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Utility
{
    /**
     * æ£€æµ‹æ‰‹æœºå·ç 
     * @param $mobile
     * @return bool
     */
    public static function validateMobile($mobile)
    {
        $phone_parttern = '/^1(?:3[\d]|5[012356789]|8[\d]|7[01678]|4[57])(-?)\d{4}\1\d{4}$/';
        return preg_match($phone_parttern, $mobile);
    }

    public static function prt($arrayToPrint) {
        print "<pre>";
        print_r($arrayToPrint);
        die;
    }

    public static function buildTree(array $elements, $parentId = 0)
    {
        $branch = [];

        foreach ($elements as $element) {
            if ($element['parent_id'] === $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[$element['id']] = $element;
                unset($elements[$element['id']]);
            }
        }
        return $branch;
    }

    public static function classActivePath($path)
    {
        if(strlen(request()->segment(1)) === 0) {
            return 'active';
        } else {
            return request()->is($path) ? ' active' : '';
        }
    }

    public static function classActiveSegment($segment, $value)
    {
        if(!is_array($value)) {
            return request()->segment($segment) === $value ? 'active' : '';
        }

        foreach ($value as $v) {
            if(request()->segment($segment) === $v) return 'active';
        }
    }

    /**
     * @param $src
     * @param $dest
     * @param $desired_width
     */
    public static function makeThumbnail($src, $dest, $desired_width, $desired_height = 0) {
        /* read the source image */
        //$source_image = imagecreatefromjpeg($src);
        if(preg_match('/[.](jpg)$/', $src)) {
            $source_image = imagecreatefromjpeg($src);
        } else if (preg_match('/[.](gif)$/', $src)) {
            $source_image = imagecreatefromgif($src);
        } else if (preg_match('/[.](png)$/', $src)) {
            $source_image = imagecreatefrompng($src);
        }

        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        if ($desired_height > 0) {
            $desired_height = floor($height * ($desired_width / $width));
        }

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }
}
