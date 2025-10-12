Get-ChildItem -Recurse -Include *.php,*.html,*.md | ForEach-Object {
    $content = Get-Content $_.FullName
    $updatedContent = $content -replace '\.html', '.php'
    Set-Content -Path $_.FullName -Value $updatedContent
}
