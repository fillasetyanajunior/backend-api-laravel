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

# Postman
link: https://api.postman.com/collections/28869600-1207e0ce-25b1-4e2f-a98a-bb02c151cdfd?access_key=PMAT-01HF5PTBMAX6Q0619GRQRFWB02

![image](https://github.com/fillasetyanajunior/backend-api-laravel/assets/62229603/26d61abd-f41a-4f2f-8d36-fec63b28b061)
