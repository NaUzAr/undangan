Add-Type -AssemblyName System.Drawing
$imageFolder = "d:\undangan nikahan mba fira\public\img"
$files = Get-ChildItem -Path $imageFolder -Include *.jpg,*.jpeg -Recurse

foreach ($file in $files) {
    Write-Host "Compressing $($file.Name) ..."
    $img = [System.Drawing.Image]::FromFile($file.FullName)
    
    $width = $img.Width
    $height = $img.Height
    $maxWidth = 1200

    $tempFile = $file.FullName + ".tmp.j"
    
    if ($width -gt $maxWidth) {
        $ratio = $height / $width
        $newHeight = [math]::Floor($maxWidth * $ratio)
        $newImg = new-object System.Drawing.Bitmap($maxWidth, $newHeight)
        $graph = [System.Drawing.Graphics]::FromImage($newImg)
        $graph.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
        $graph.DrawImage($img, 0, 0, $maxWidth, $newHeight)
        $img.Dispose()
        
        $newImg.Save($tempFile, [System.Drawing.Imaging.ImageFormat]::Jpeg)
        $newImg.Dispose()
    } else {
        $tempImg = new-object System.Drawing.Bitmap($img)
        $img.Dispose()
        $tempImg.Save($tempFile, [System.Drawing.Imaging.ImageFormat]::Jpeg)
        $tempImg.Dispose()
    }
    
    Remove-Item -Path $file.FullName -Force
    Move-Item -Path $tempFile -Destination $file.FullName -Force
}
Write-Host "All images compressed successfully!"
