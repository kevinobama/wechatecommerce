<?php
/**
 * Created by Aptana studio.
 * Author: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2016/03/25
 * Time: 15:07
 * Email: zhouwensheng@hihooray.com
 * Teacher Files Helper
 */
namespace App\Helpers;

use Config;

class TeacherFilesHelper
{
    /**
     * get Icon By Extension
     * @param $fileFullName
     * @return string
     */
    public static function getIconByExtension($fileFullName)
    {
        $iconImage = "images/Question-Mark.gif";
        if ($fileFullName) {
            list($fileName, $extension) = explode(".", $fileFullName);
            switch ($extension) {
                case "doc":
                case "docx":
                    $iconImage = "images/hihooray-MS-Word-2.ico";
                    break;
                case "pptx":
                case "ppt":
                    $iconImage = "images/hihooray-PowerPoint.ico";
                    break;
                case "pdf":
                    $iconImage = "images/hihooray-Adobe-PDF-Document.ico";
                    break;
                default:
                    $iconImage = "images/Question-Mark.gif";
            }
        }
        return $iconImage;
    }

    /**
     * convert Pdf To Images
     * @param $pdfFile
     * @param $imagePath
     * @return string
     */
    public static function convertPdfToImages($pdfFile, $imagePath)
    {
        $density = Config::get('hihooray.hooray_teacher_image.density');
        $quality = Config::get('hihooray.hooray_teacher_image.quality');
        //convert pdf to images
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0777, true);
        }
        $pdfToImages = "magick -density {$density} {$pdfFile}  -quality {$quality} {$imagePath}page%d.jpg";
        return $pdfToImagesConvertMsessage = shell_exec($pdfToImages);
    }
}