# Aplikasi sederhana manajemen musik

## ERD

![ERD](https://github.com/fahmad480/Musiku/blob/main/ERD.png?raw=true)

## Screenshot

![Login Page](https://github.com/fahmad480/Musiku/blob/main/Screenshot_1.png?raw=true)

![Register Page](https://github.com/fahmad480/Musiku/blob/main/Screenshot_2.png?raw=true)

![Dashboard Page](https://github.com/fahmad480/Musiku/blob/main/Screenshot_3.png?raw=true)

![Library Page](https://github.com/fahmad480/Musiku/blob/main/Screenshot_4.png?raw=true)

## Cara Install Bagian Backend

URL API: `http://localhost:8000/api`

1. `cd backend`
2. `composer install`
3. `cp .env.example .env`
4. isi JWT_SECRET di .env dengan random string, ubah nama database, username, dan password sesuai dengan database yang akan digunakan
5. `php artisan serve`
6. `php artisan migrate:fresh`
7. `php artisan storage:link`

## Cara Install Bagian Frontend

URL: `http://localhost:3000`

1. `cd frontend`
2. `npm install`
3. `npm start`

## Postman

Dokumentasi API bisa import dari file `Postman.json`, terdapat 2 variable

<!-- buatkan tabel dengan kolom nama variable, deskripsi, required -->

| Variable | Deskripsi | Required |
| -------- | --------- | -------- |
| `url`    | URL API   | Ya       |
| `token`  | Token JWT | Ya       |
