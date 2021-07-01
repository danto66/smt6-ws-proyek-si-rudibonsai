# Petunjuk untuk Memulai Projek

1. Clone repositori projek
2. Buka di text editor
3. Mengatur file `.env` :
	- Duplikat / copas file `.env.example`
	- File `.env.example` __JANGAN DIHAPUS DAN JANGAN DIUBAH!!!__
	- Ganti nama file duplikatnya menjadi `.env`
	- Buka file `.env`
	- Ganti `null` menjadi API_KEY Rajaongkir akun anda
		```
		KEY_RAJAONGKIR=null
		```
	- Atur konfigurasi database
		```
		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=web_framework_rudibonsai
		DB_USERNAME=root
		DB_PASSWORD=
		```
	- Atur konfigurasi mail server
		```
		MAIL_MAILER=smtp
		MAIL_HOST=null
		MAIL_PORT=2525
		MAIL_USERNAME=null
		MAIL_PASSWORD=null
		MAIL_ENCRYPTION=tls
		```
4. Install library php :
	- `composer install`
5. Generate key aplikasi :
	- `php artisan key:generate`
6. Migrasi database
	- `php artisan migrate:fresh`
	- `php artisan db:seed`
7. Install library js :
	- `npm install`
8. Generate frontend development mode 
	- `npm run dev`
9. Jalankan server
	- `php artisan serve`
10. Mulai koding

### Untuk testing android jalankan 
- `php artisan serve --host 192.168.0.1 --port 80`
- Ganti `192.168.0.1` menjadi alamat ip laptop / laravel
