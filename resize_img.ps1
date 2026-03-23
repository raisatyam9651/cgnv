param(
    [string]$SourcePath,
    [string]$DestPath
)
Add-Type -AssemblyName System.Drawing
[System.Drawing.Image]$img = $null
[System.Drawing.Bitmap]$bmp = $null
[System.Drawing.Graphics]$graphics = $null
try {
    $img = [System.Drawing.Image]::FromFile($SourcePath)
    $bmp = New-Object System.Drawing.Bitmap(1200, 800)
    $graphics = [System.Drawing.Graphics]::FromImage($bmp)
    
    $graphics.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
    $graphics.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
    $graphics.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
    $graphics.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality

    $graphics.DrawImage($img, 0, 0, 1200, 800)
    $bmp.Save($DestPath, [System.Drawing.Imaging.ImageFormat]::Png)
    Write-Host "Successfully resized $SourcePath to $DestPath (1200x800)"
} finally {
    if ($graphics) { $graphics.Dispose() }
    if ($bmp) { $bmp.Dispose() }
    if ($img) { $img.Dispose() }
}
