# gslcSession9

# Installations:
1. composer require laravel/socialite
2. php artisan config:cache
3. php artisan serve

# How Socialite Feature Works?:
You must set your GitHub OAuth and Google OAuth and get their client_id and secret_id, also set callback links.

How to get them?
Google OAuth
- Open console.developers.google.com
- edit your OAuth Consent Screen and set your credentials.
- then you will get them.

You have to edit your env file and services.php file.
- Open github.com and go to your settings
- open developers settings then click OAuth settings
- set them and you will get them.

After you get all of them, you may add them to your services.php and env files.

add these code to your env file.
GOOGLE_CLIENT_ID= #YOUR_CLIENT_ID
GOOGLE_CLIENT_SECRET= #YOUR_CLIENT_SECRET
GOOGLE_CLIENT_REDIRECT= #YOUR_CLIENT_REDIRECT

GITHUB_CLIENT_ID= #YOUR_CLIENT_ID
GITHUB_CLIENT_SECRET= #YOUR_CLIENT_SECRET
GITHUB_CLIENT_REDIRECT= #YOUR_CLIENT_REDIRECT

and add these code to your services.php file.
'google' => [
  'client_id' => env('GOOGLE_CLIENT_ID'),
  'client_secret' => env('GOOGLE_CLIENT_SECRET'),
  'redirect' => env('GOOGLE_CLIENT_REDIRECT'),
],

'github' => [
  'client_id' => env('GITHUB_CLIENT_ID'),
  'client_secret' => env('GITHUB_CLIENT_SECRET'),
  'redirect' => env('GITHUB_CLIENT_REDIRECT'),
]

Note: There are some features that couldn't work properly, kindly check it 🙏
