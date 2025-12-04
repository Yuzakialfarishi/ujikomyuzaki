# 🔐 Login & Logout System - TastyFood Admin Panel

## Overview
Sistem autentikasi login/logout yang profesional telah ditambahkan ke admin panel TastyFood.

---

## 📋 Fitur Utama

### 1. **Login Page**
- ✅ Design modern dengan gradient background
- ✅ Email & password input fields
- ✅ Remember me checkbox
- ✅ Form validation
- ✅ Error messages
- ✅ Responsive design (mobile, tablet, desktop)
- ✅ Security features display

### 2. **Logout Button**
- ✅ Located di topbar (navbar admin)
- ✅ Show user name dari database
- ✅ One-click logout
- ✅ Gradient red button
- ✅ Session invalidation
- ✅ Redirect ke homepage

### 3. **Security Features**
- ✅ CSRF protection (@csrf token)
- ✅ Session management
- ✅ Password hashing (bcrypt)
- ✅ Remember me functionality
- ✅ Session regeneration on logout
- ✅ Auth middleware protection

---

## 🚀 Setup Instructions

### 1. Database Migration
Pastikan table `users` sudah ada:
```bash
php artisan migrate
```

### 2. Seed Test User
```bash
php artisan db:seed
```

Test credentials:
```
Email: test@example.com
Password: password (default dari factory)
```

### 3. Create Admin User (Optional)
```bash
php artisan tinker
>>> User::create(['name' => 'Admin', 'email' => 'admin@tastyfood.com', 'password' => bcrypt('admin123')])
```

---

## 📁 Files Created/Modified

### New Files:
```
✅ app/Http/Controllers/AuthController.php
✅ resources/views/auth/login.blade.php
✅ ADMIN_LOGIN_SYSTEM.md (this file)
```

### Modified Files:
```
✅ routes/web.php (added auth routes & middleware)
✅ resources/views/admin/layout.blade.php (added logout button & styling)
```

---

## 🔄 Request Flow

### Login Flow:
```
User → Login Page (/login) → Enter Credentials → POST /login 
→ AuthController@login → Validate → Auth::attempt() 
→ Success? → Redirect to /admin → Dashboard
→ Fail? → Back to login with errors
```

### Logout Flow:
```
User → Click Logout Button → POST /logout 
→ AuthController@logout → Auth::logout() 
→ Session invalidate & regenerate → Redirect / (homepage) 
→ Success message
```

### Access Admin Flow:
```
Unauthenticated User → Try /admin 
→ Middleware 'auth' check → Not logged in? 
→ Redirect to /login
→ Authenticated User → /admin allowed
```

---

## 💾 Database Schema

### Users Table:
```sql
CREATE TABLE users (
    id BIGINT UNSIGNED PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
)
```

---

## 🎨 UI Components

### Login Page:
- Gradient background (purple)
- Centered white card
- Lock icon header
- Email input dengan icon
- Password input dengan icon
- Remember me checkbox
- Login button dengan hover effect
- Security features badges
- Footer info text

### Logout Button (Topbar):
- User icon + name display
- Red gradient button
- Hover effect dengan shadow
- Responsive (hidden on mobile, show icon only)
- Embedded form dengan @csrf token

---

## 🔐 Security Details

### Password Hashing:
```php
// Automatic via User model casts
protected function casts(): array
{
    return [
        'password' => 'hashed',
    ];
}
```

### Session Management:
```php
// CSRF Protection
@csrf token di form

// Session Regeneration
$request->session()->regenerate();  // After login
$request->session()->invalidate();  // After logout
$request->session()->regenerateToken(); // After logout
```

### Middleware Protection:
```php
// Admin routes protected
Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(...)

// Public login route
Route::middleware('guest')->group(...)
```

---

## 🧪 Testing

### Test Login:
1. Go to: `http://localhost:8000/login`
2. Enter: `test@example.com` / `password`
3. Click: "Masuk ke Admin Panel"
4. Should redirect to: `/admin` dashboard

### Test Logout:
1. From admin panel, click logout button (top right)
2. Should redirect to homepage with success message

### Test Protected Routes:
1. Without login, try to access: `/admin`
2. Should redirect to login page

### Test Remember Me:
1. Check "Ingat saya" checkbox
2. Login
3. Close browser and reopen
4. Should still be logged in (session cookie persists)

---

## 📱 Responsive Breakpoints

### Mobile (<480px):
- Login card fits screen
- All inputs full width
- Button full width
- Reduced padding

### Tablet (480px - 768px):
- Login card 100% width with margins
- Normal spacing
- Large touch targets

### Desktop (>768px):
- Fixed 450px card width
- Normal layout
- Topbar shows username
- Logout button visible

---

## 🎯 Styling Details

### Login Page:
```css
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%)
border-radius: 12px
box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3)
animation: slideUp 0.5s ease
```

### Logout Button:
```css
background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%)
padding: 8px 16px
border-radius: 6px
font-weight: 500
transition: all 0.3s ease
```

---

## 🔗 Route URLs

| Route | Method | Controller | Auth Required |
|-------|--------|-----------|----------------|
| /login | GET | AuthController@showLogin | No (guest) |
| /login | POST | AuthController@login | No (guest) |
| /logout | POST | AuthController@logout | Yes (auth) |
| /admin | GET | AdminHomeController | Yes (auth) |
| /admin/* | * | Various | Yes (auth) |

---

## ⚙️ Configuration

### Auth Config (.env):
```
AUTH_GUARD=web
AUTH_MODEL=App\Models\User
AUTH_PASSWORD_BROKER=users
```

### Session Config:
```php
// config/session.php
'driver' => env('SESSION_DRIVER', 'file')
'lifetime' => 120 // minutes
'expire_on_close' => false
```

---

## 🐛 Troubleshooting

### Issue: "CSRF token mismatch"
**Solution**: Clear browser cache, refresh page

### Issue: Login not working
**Solution**: Check database connection, run migrations & seeds

### Issue: Logout doesn't work
**Solution**: Check session driver, clear session storage

### Issue: Can't access admin after login
**Solution**: Check middleware, verify auth guard in config

### Issue: Remember me not working
**Solution**: Check browser cookies enabled, session lifetime

---

## 📝 Default Credentials

After running seeder:
```
Email: test@example.com
Password: password
Name: Test User
```

### Create Custom Admin:
```bash
php artisan tinker
User::create([
    'name' => 'Admin Utama',
    'email' => 'admin@tastyfood.com',
    'password' => bcrypt('admin@123')
])
```

---

## 🚀 Next Steps

1. ✅ Customize user creation in seeder
2. ✅ Add "Forgot Password" functionality
3. ✅ Add user profile page
4. ✅ Add role-based access control
5. ✅ Add login activity logging
6. ✅ Add 2FA (Two-Factor Authentication)

---

## 📊 Summary

| Feature | Status | File |
|---------|--------|------|
| Login Page | ✅ Complete | auth/login.blade.php |
| Logout Button | ✅ Complete | admin/layout.blade.php |
| AuthController | ✅ Complete | app/Http/Controllers/AuthController.php |
| Routes & Middleware | ✅ Complete | routes/web.php |
| Form Validation | ✅ Complete | AuthController.php |
| Session Management | ✅ Complete | AuthController.php |
| CSRF Protection | ✅ Complete | Built-in Laravel |
| Responsive Design | ✅ Complete | auth/login.blade.php |

---

**Status: ✅ COMPLETE - Login/Logout system is ready for production!**

System authentication sekarang lengkap dengan login page yang modern dan logout button di admin panel. 🎉
