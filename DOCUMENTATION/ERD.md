# ERD - Entity Relationship Diagram (Tastyfood Project)

```
┌─────────────────────────────────────────────────────────────────┐
│                        DATABASE SCHEMA                          │
└─────────────────────────────────────────────────────────────────┘

┌─────────────────────┐
│      USERS          │
├─────────────────────┤
│ id (PK)             │
│ name                │
│ email (UNIQUE)      │
│ password            │
│ created_at          │
│ updated_at          │
└─────────────────────┘

┌─────────────────────────────┐
│        BERITAS              │
├─────────────────────────────┤
│ id (PK)                     │
│ judul (VARCHAR)             │
│ slug (VARCHAR, UNIQUE)      │◄────────────┐
│ isi (TEXT)                  │             │
│ gambar (VARCHAR)            │             │ 1:N
│ created_at (TIMESTAMP)      │             │ (Frontend displays
│ updated_at (TIMESTAMP)      │             │  multiple berita)
└─────────────────────────────┘             │
           ▲                                 │
           │                                 │
           │ Used by                         │
           │ (Admin CRUD)                    │
           │                                 │
┌──────────┴──────────┐
│  AdminBeritaController
└─────────────────────┘

┌─────────────────────────────┐
│        GALERIS              │
├─────────────────────────────┤
│ id (PK)                     │
│ judul (VARCHAR)             │◄────────────┐
│ deskripsi (TEXT)            │             │
│ gambar (VARCHAR)            │             │ 1:N
│ created_at (TIMESTAMP)      │             │ (Frontend displays
│ updated_at (TIMESTAMP)      │             │  multiple galeri)
└─────────────────────────────┘             │
           ▲                                 │
           │                                 │
           │ Used by                         │
           │ (Admin CRUD)                    │
           │                                 │
┌──────────┴──────────┐
│  AdminGaleriController
└─────────────────────┘

┌─────────────────────────────┐
│        KONTAKS              │
├─────────────────────────────┤
│ id (PK)                     │
│ nama (VARCHAR)              │
│ email (VARCHAR)             │
│ pesan (TEXT)                │
│ created_at (TIMESTAMP)      │
│ updated_at (TIMESTAMP)      │
└─────────────────────────────┘
           ▲
           │
           │ Used by
           │ (Admin CRUD + Export)
           │
┌──────────┴──────────────────┐
│  AdminKontakController       │
│  - export() → CSV            │
│  - search() → filter         │
└─────────────────────────────┘

┌─────────────────────────────┐
│        SESSIONS             │
├─────────────────────────────┤
│ id (PK)                     │
│ user_id (FK) [nullable]     │
│ ip_address                  │
│ user_agent                  │
│ payload                     │
│ last_activity               │
└─────────────────────────────┘
           ▲
           │
           │ Laravel default
           │
        └──┘

┌─────────────────────────────┐
│        CACHE                │
├─────────────────────────────┤
│ key (PK)                    │
│ value                       │
│ expiration                  │
└─────────────────────────────┘

┌─────────────────────────────┐
│         JOBS                │
├─────────────────────────────┤
│ id (PK)                     │
│ queue                       │
│ payload                     │
│ attempts                    │
│ reserved_at                 │
│ available_at                │
│ created_at                  │
└─────────────────────────────┘

```

## Relationships

| Table 1 | Relationship | Table 2 | Notes |
|---------|--------------|---------|-------|
| BERITAS | 1:N | Frontend (BeritaController) | Frontend reads multiple berita, displays as list & detail |
| GALERIS | 1:N | Frontend (GaleriController) | Frontend reads multiple galeri items |
| KONTAKS | 1:N | Frontend (KontakController) | Frontend sends messages, Admin views/filters/exports |

## Key Features

- **Beritas**: Has `slug` for SEO-friendly URLs (auto-generated from `judul`)
- **Galeris**: Stores image path with description
- **Kontaks**: Messages from frontend contact form, searchable by nama/email
- **Sessions**: Laravel default for user sessions
- **Cache**: For application caching
- **Jobs**: For queued tasks (if needed)

## Data Flow

```
┌─────────────────────────────────────────────────────────────────┐
│                      FRONTEND FLOW                              │
└─────────────────────────────────────────────────────────────────┘

User (Public)
    │
    ├─→ GET /berita
    │   └─→ BeritaController@index
    │       └─→ SELECT * FROM beritas ORDER BY created_at DESC
    │           ├─→ $berita_utama (latest 1)
    │           └─→ $berita_lainnya (skip 1, limit 6)
    │               └─→ Display in pages/berita.blade.php
    │
    ├─→ GET /berita/{slug}
    │   └─→ BeritaController@detail
    │       └─→ SELECT * FROM beritas WHERE slug = ?
    │           └─→ Display in pages/berita_detail.blade.php
    │
    ├─→ GET /galeri
    │   └─→ GaleriController@index
    │       └─→ SELECT * FROM galeris ORDER BY latest
    │           └─→ Display in pages/galeri.blade.php
    │
    ├─→ GET /galeri/{id}
    │   └─→ GaleriController@detail
    │       └─→ SELECT * FROM galeris WHERE id = ?
    │           └─→ Display in pages/galeri-detail.blade.php
    │
    └─→ POST /kontak/kirim
        └─→ KontakController@store
            └─→ INSERT INTO kontaks (nama, email, pesan)
                └─→ Redirect with success message

┌─────────────────────────────────────────────────────────────────┐
│                       ADMIN FLOW                                │
└─────────────────────────────────────────────────────────────────┘

Admin User
    │
    ├─→ GET /admin
    │   └─→ AdminHomeController@index
    │       ├─→ COUNT(*) FROM beritas
    │       ├─→ COUNT(*) FROM galeris
    │       ├─→ COUNT(*) FROM kontaks
    │       ├─→ SELECT * FROM beritas LIMIT 5 (recent)
    │       └─→ SELECT * FROM kontaks LIMIT 5 (recent)
    │           └─→ Display in admin/home.blade.php
    │
    ├─→ BERITA MANAGEMENT
    │   ├─→ GET /admin/berita → list all
    │   ├─→ GET /admin/berita/create → form
    │   ├─→ POST /admin/berita → store (auto-generate slug)
    │   ├─→ GET /admin/berita/{id}/edit → edit form
    │   ├─→ PUT /admin/berita/{id} → update
    │   └─→ DELETE /admin/berita/{id} → delete + remove image
    │
    ├─→ GALERI MANAGEMENT
    │   ├─→ GET /admin/galeri → list all
    │   ├─→ GET /admin/galeri/create → form
    │   ├─→ POST /admin/galeri → store
    │   ├─→ GET /admin/galeri/{id}/edit → edit form
    │   ├─→ PUT /admin/galeri/{id} → update
    │   └─→ DELETE /admin/galeri/{id} → delete + remove image
    │
    └─→ KONTAK MANAGEMENT
        ├─→ GET /admin/kontak → list all (with search filter)
        ├─→ GET /admin/kontak/create → form
        ├─→ POST /admin/kontak → store
        ├─→ GET /admin/kontak/export → download CSV
        └─→ DELETE /admin/kontak/{id} → delete message

```

## Image Storage

```
public/
├── uploads/
│   ├── berita/
│   │   ├── 1764038917.jpg
│   │   ├── 1764049683.jpg
│   │   └── ...
│   └── galeri/
│       ├── 1764209974_filename.jpg
│       ├── 1764212383_filename.jpg
│       └── ...
└── ASET/
    └── (fallback images for preview)
```

Database stores relative paths:
- Berita: `uploads/berita/1764038917.jpg`
- Galeri: `uploads/galeri/1764209974_filename.jpg`
