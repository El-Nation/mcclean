$lines = Get-Content 'index.php'
$out = @($lines[0..243]) + @($lines[474..($lines.Length - 1)])
[System.IO.File]::WriteAllLines((Resolve-Path 'index.php').Path, $out, [System.Text.Encoding]::UTF8)
Write-Host "Done. Lines kept: $($out.Length)"
