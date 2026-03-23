Get-ChildItem -Path "e:\suraj\cgnv\cgnv\blog\*.php" | ForEach-Object {
    $content = Get-Content $_.FullName -Raw
    $newContent = $content -replace 'https://www.cognivicdigital.com/images/blog/([a-zA-Z0-9_-]+)\.(svg|jpg|jpeg)', 'https://www.cognivicdigital.com/images/blog/$1.png'
    $newContent = $newContent -replace '/images/blog/([a-zA-Z0-9_-]+)\.svg', '/images/blog/$1.png'
    if ($content -ne $newContent) {
        Set-Content -Path $_.FullName -Value $newContent -NoNewline
        Write-Host "Updated $($_.Name)"
    }
}
