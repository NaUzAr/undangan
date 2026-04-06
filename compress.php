<?php
ini_set('memory_limit', '1024M');

$directory = __DIR__ . '/public/img';

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
$images = [];

foreach ($iterator as $file) {
    if ($file->isFile() && in_array(strtolower($file->getExtension()), ['jpg', 'jpeg'])) {
        $images[] = $file->getPathname();
    }
}

foreach ($images as $filepath) {
    echo "Compressing: " . basename($filepath) . " (" . filesize($filepath) . " bytes)\n";
    $source_image = @imagecreatefromjpeg($filepath);
    if (!$source_image) {
        echo "Failed to read image\n";
        continue;
    }

    $width = imagesx($source_image);
    $height = imagesy($source_image);

    $max_width = 1200;
    if ($width > $max_width) {
        $ratio = $height / $width;
        $new_width = $max_width;
        $new_height = $max_width * $ratio;

        $virtual_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        imagejpeg($virtual_image, $filepath, 75);
        imagedestroy($virtual_image);
    } else {
        // Just compress it even if it's smaller than max width
        imagejpeg($source_image, $filepath, 75);
    }
    
    imagedestroy($source_image);
    echo "Done! New size: " . filesize($filepath) . " bytes\n";
}
echo ("All images compressed successfully!\n");
?>
