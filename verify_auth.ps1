$base = "http://localhost:8000"
$jar = "$PSScriptRoot/cookies.txt"
$email = "verify_$(Get-Date -UFormat %s)@example.com"

# 1) GET /register and grab CSRF token + cookie
$html = curl.exe -s -c $jar -b $jar "$base/register"
$token = [regex]::Match($html, 'name="_token" value="([^"]+)"').Groups[1].Value
Write-Host "CSRF token: $($token.Substring(0,8))..."

# 2) POST /register
$reg = curl.exe -s -c $jar -b $jar -o /dev/null -w "%{http_code}" -D "$PSScriptRoot/reg_headers.txt" -X POST "$base/register" `
  --data-urlencode "_token=$token" `
  --data-urlencode "name=Verify User" `
  --data-urlencode "email=$email" `
  --data-urlencode "password=password123" `
  --data-urlencode "password_confirmation=password123"
Write-Host "Register POST status: $reg"
Write-Host "Register redirect: $(Select-String -Path $PSScriptRoot/reg_headers.txt -Pattern '^location:' | ForEach-Object { $_.Line })"

# 3) Confirm user exists in DB
php -r "require 'vendor/autoload.php'; `$app = require 'bootstrap/app.php'; `$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); `$u = App\Models\User::where('email','$email')->first(); echo `$u ? 'User created: '.\$u->name : 'User NOT created'; echo PHP_EOL;"

# 4) GET /login to fetch a fresh token for login
$html2 = curl.exe -s -c $jar -b $jar "$base/login"
$token2 = [regex]::Match($html2, 'name="_token" value="([^"]+)"').Groups[1].Value

# 5) POST /login
$login = curl.exe -s -c $jar -b $jar -o /dev/null -w "%{http_code}" -D "$PSScriptRoot/login_headers.txt" -X POST "$base/login" `
  --data-urlencode "_token=$token2" `
  --data-urlencode "email=$email" `
  --data-urlencode "password=password123"
Write-Host "Login POST status: $login"
Write-Host "Login redirect: $(Select-String -Path $PSScriptRoot/login_headers.txt -Pattern '^location:' | ForEach-Object { $_.Line })"

# 6) Hit /dashboard with the session cookie -> should be 200 if authenticated
$dash = curl.exe -s -b $jar -o /dev/null -w "%{http_code}" "$base/dashboard"
Write-Host "GET /dashboard (authed) status: $dash"
