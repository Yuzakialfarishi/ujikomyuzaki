# Push ke GitHub - Panduan Langkah demi Langkah

## Metode 1: Push Langsung (Disarankan)

Jalankan perintah berikut dari **Command Prompt atau PowerShell** di laptop/PC Anda:

```powershell
cd C:\xampp\htdocs\Tastyfood
git push origin master
```

Jika diminta username/password:
- **Username:** Masukkan GitHub username Anda (misal: `Yuzakialfarishi`)
- **Password:** Gunakan Personal Access Token (bukan password akun GitHub)

### Cara mendapatkan Personal Access Token:

1. Buka https://github.com/settings/tokens
2. Klik "Generate new token" → "Generate new token (classic)"
3. Beri nama: `tastyfood-push`
4. Pilih scope: `repo` (full control of private repositories)
5. Klik "Generate token"
6. **Copy token yang dihasilkan**
7. Saat `git push` meminta password, paste token ini

---

## Metode 2: Jika Push Gagal Lagi

Gunakan SSH key:

```powershell
cd C:\xampp\htdocs\Tastyfood
git remote set-url origin git@github.com:Yuzakialfarishi/ujikomyuzaki.git
git push origin master
```

(SSH harus sudah dikonfigurasi di GitHub)

---

## Metode 3: Import Bundle (Jika Network Bermasalah)

File `tastyfood-latest.bundle` sudah tersedia di folder project.

1. Dari local machine:
```powershell
cd C:\xampp\htdocs\Tastyfood
git pull tastyfood-latest.bundle master
git push origin master
```

---

## Verifikasi Push Berhasil

Setelah push, buka https://github.com/Yuzakialfarishi/ujikomyuzaki
dan cek apakah branch `master` menampilkan commit terbaru dengan pesan:
- "feat: add berita/galeri detail views, run slug migration..."

---

## Status Commit yang Akan Di-push

- ✅ Migration slug
- ✅ Berita detail view
- ✅ Galeri detail view
- ✅ Dashboard improvements
- ✅ Auto-update frontend
- ✅ Fixed admin berita delete
- ✅ Admin kontak CRUD + export

Semua file sudah committed dan siap! 🎉
