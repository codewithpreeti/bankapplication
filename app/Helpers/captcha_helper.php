<?php

use CodeIgniter\I18n\Time;

if (!function_exists('generate_captcha')) {
    function generate_captcha($captcha_path = 'writable/captcha/')
    {
        // Ensure captcha folder exists
        if (!is_dir($captcha_path)) {
            mkdir($captcha_path, 0755, true);
        }

        $word = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, 6);

        if (!function_exists('imagecreatetruecolor')) {
            throw new \RuntimeException('GD extension is not loaded in this PHP SAPI.');
        }
        $image = imagecreatetruecolor(150, 50);
        $bg_color = imagecolorallocate($image, 255, 255, 255);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $line_color = imagecolorallocate($image, 64, 64, 64);

        imagefilledrectangle($image, 0, 0, 150, 50, $bg_color);

        // Add some lines for noise
        for ($i = 0; $i < 5; $i++) {
            imageline($image, 0, rand(0, 50), 150, rand(0, 50), $line_color);
        }

//        echo __DIR__;
//        echo "<br>";
//        echo $_SERVER['DOCUMENT_ROOT'];
//        echo "<br>";
//        echo ">>" . realpath('writable/captcha/1756235292.png');
//        die;

        // Add text
        imagettftext($image, 20, rand(-10, 10), 20, 35, $text_color, __DIR__ . '/../ThirdParty/Fonts/arial/ARIAL.TTF', $word);

        $filename = $captcha_path . Time::now()->getTimestamp() . '.png';
//        echo $filename;
//        echo base_url($filename);
//        die;
        imagepng($image, $filename);
        imagedestroy($image);

        return [
            'word' => $word,
//            'image_path' => base_url(str_replace('writable/', '', $filename))
            'image_path' => base_url($filename)
        ];
    }
}
?>