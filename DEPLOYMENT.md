# Panduan Deployment ke Server

Berikut adalah langkah-langkah untuk mendeploy aplikasi ini ke server VPS Anda.

## 1. Persiapan Local (Laptop Anda)
Repo git sudah diinisialisasi secara lokal (pastikan Anda meng-approve perintah git di terminal).
Jika Anda ingin menggunakan GitHub/GitLab:
1.  Buat repository kosong di GitHub/GitLab.
2.  Hubungkan dengan perintah:
    ```bash
    git remote add origin <URL_REPOSITORY_ANDA>
    git push -u origin master
    ```

## 2. Persiapan Server
Masuk ke server Anda via SSH:
```bash
ssh root@203.194.115.76
```

### Install Docker (Jika belum ada)
```bash
curl -fsSL https://get.docker.com -o get-docker.sh
sh get-docker.sh
```

### Setup Folder Project
Kita akan clone repository (jika pakai Git) atau copy file manual.
Misal menggunakan Git:
```bash
cd /var/www
git clone <URL_REPOSITORY_ANDA> undangan-nikahan
cd undangan-nikahan
```

### Setup Environment
Copy file `.env` dan sesuaikan untuk server.
```bash
cp .env.example .env
nano .env
```
**PENTING**:
- Ubah `APP_URL` ke domain asli (misal `https://undangan.com`).
- Ubah `DB_CONNECTION` jika ingin pakai Postgres (sesuaikan dengan docker-compose.yml).
- Jika tetap pakai SQLite, pastikan file database dibuat:
  ```bash
  touch database/database.sqlite
  ```

## 3. Jalankan Aplikasi
Jalankan docker compose:
```bash
docker compose up -d --build
```

## 4. Setup Terakhir
Jalankan permission dan migrasi database:
```bash
# Set permission storage
docker compose exec app chown -R www-data:www-data /var/www/html/storage

# Run migration
docker compose exec app php artisan migrate --force

# Optimize cache
docker compose exec app php artisan optimize
```

## Troubleshooting
Jika ada error permission:
```bash
chmod -R 777 storage bootstrap/cache
```
