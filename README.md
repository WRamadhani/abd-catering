# abd-catering
Website pemesanan makanan (Catering) online menggunakan framework <a href="https://laravel.com/">Laravel</a>

<a href="https://wadhani.000webhostapp.com" target="_blank">DEMO</a>

# FITUR
- pemesanan makanan dengan paket
- multi-user (admin, caterer, user)
- testimoni
- responsif
- riwayat pesanan

# INSTALASI
- cp .env.example .env
- composer install
- php artisan key:generate
- edit file .env sesuaikan nama, username, dan password database
- php artisan migrate --seed
- php artisan storage:link
- php artisan serve
