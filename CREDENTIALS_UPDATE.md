# 🔐 Update Kredensial Admin - Panduan

Kredensial login admin telah diubah menjadi:

```
Email: admin@gmail.com
Password: 12345
```

---

## ⚙️ Langkah-Langkah Update Database

### Option 1: Fresh Database (Recommended)
```bash
# Reset database dan seed ulang
php artisan migrate:fresh --seed
```

### Option 2: Manual Update (Jika sudah ada data)
```bash
# Masuk ke tinker
php artisan tinker

# Hapus user lama
User::truncate()

# Buat user baru
User::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('12345')
])

# Exit tinker
exit
```

### Option 3: Update User Existing
```bash
php artisan tinker

# Update user yang ada
$user = User::first()
$user->update([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('12345')
])

exit
```

---

## 🔓 Test Login

### URL:
```
http://localhost:8000/login
```

### Credentials:
```
Email: admin@gmail.com
Password: 12345
```

### Steps:
1. Go to login page
2. Enter email: `admin@gmail.com`
3. Enter password: `12345`
4. Check "Ingat saya" (optional)
5. Click "Masuk ke Admin Panel"
6. Should redirect to `/admin` dashboard

---

## 📝 Files Updated

### Database Seeder:
```php
// database/seeders/DatabaseSeeder.php
User::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('12345'),
]);
```

### Login Page Footer:
```html
<!-- resources/views/auth/login.blade.php -->
Email: <strong>admin@gmail.com</strong> | Password: <strong>12345</strong>
```

---

## ✅ Verification Checklist

- [x] Seeder updated dengan email baru
- [x] Password di-hash dengan bcrypt
- [x] Login page menampilkan kredensial
- [x] Ready untuk db:seed

---

## 🚀 Next Steps

1. Run migration/seeding command
2. Go to login page
3. Enter new credentials
4. Access admin dashboard
5. Test logout functionality
6. Verify session works

---

**Credentials are now:**
- ✅ Email: `admin@gmail.com`
- ✅ Password: `12345`

Ready to use! 🎉
