# backend-api-laravel
# Instalation
1. Pertama clone project githubnya
```
$ git clone https://github.com/fillasetyanajunior/backend-api-laravel
```
2. Kedua install project
```
$ composer install
```
3. ketiga duplicate file ```.env.example``` dan rename menjadi ```.env```
4. setelah selesai semuanya ketik perintah dibawah ini di terminal
```
$ php artisan key:generate
```
5. setelah itu buat database dengan nama ```backend-api-laravel```
6. setelah itu buka file ```.env``` lalu ubah pada bagian ```DB_DATABASE=``` dengan database yang sudah di buat
7. setelah pada file ```.env``` lalu ubah pada bagian ```APP_URL=``` dengan url masing-masing localhost
8. setelah itu jalankan perintah di bawah ini
```
$ php artisan migrate:fresh --seed
```
10. terakhir jalankan projectnya
Bagi yang menggunakan laragon tidak perlu menjalankan perintah ini
```
$ php artisan serve
```
