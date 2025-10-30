# Alumni API Documentation

## Base URL
```
/api/alumni
```

## Endpoints

### 1. Get All Alumni
**GET** `/api/alumni`

Mendapatkan daftar semua alumni dengan pagination, filter, dan pencarian.

**Query Parameters:**
- `angkatan` (optional) - Filter berdasarkan angkatan
- `search` (optional) - Pencarian berdasarkan nama
- `sort_by` (optional, default: `created_at`) - Kolom untuk sorting
- `sort_order` (optional, default: `desc`) - Urutan sorting (asc/desc)
- `per_page` (optional, default: `10`) - Jumlah data per halaman

**Example Request:**
```bash
GET /api/alumni?angkatan=26&search=Reza&per_page=15
```

**Response:**
```json
{
  "status": true,
  "message": "Alumni retrieved successfully",
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "name": "Reza Pratama",
        "slug": "reza-pratama",
        "photo": "/assets/image/alumni/alif.png",
        "angkatan": "26",
        "current_job": "Tech Entrepreneur",
        "company": "Founder of StartupXYZ",
        "quote": "Semangat kewirausahaan yang ditanamkan di Moklet membuat saya berani memulai bisnis sendiri di usia muda."
      }
    ],
    "total": 1,
    "per_page": 15,
    "last_page": 1
  }
}
```

---

### 2. Get Alumni by Slug
**GET** `/api/alumni/{slug}`

Mendapatkan detail alumni berdasarkan slug.

**Example Request:**
```bash
GET /api/alumni/reza-pratama
```

**Response:**
```json
{
  "status": true,
  "message": "Alumni retrieved successfully",
  "data": {
    "id": 1,
    "name": "Reza Pratama",
    "slug": "reza-pratama",
    "photo": "/assets/image/alumni/alif.png",
    "angkatan": "26",
    "current_job": "Tech Entrepreneur",
    "company": "Founder of StartupXYZ",
    "quote": "Semangat kewirausahaan yang ditanamkan di Moklet membuat saya berani memulai bisnis sendiri di usia muda."
  }
}
```

---

### 3. Get Alumni by Angkatan
**GET** `/api/alumni/angkatan/{angkatan}`

Mendapatkan daftar alumni berdasarkan angkatan tertentu.

**Example Request:**
```bash
GET /api/alumni/angkatan/26
```

**Response:**
```json
{
  "status": true,
  "message": "Alumni retrieved successfully",
  "data": [
    {
      "id": 1,
      "name": "Reza Pratama",
      "slug": "reza-pratama",
      "photo": "/assets/image/alumni/alif.png",
      "angkatan": "26",
      "current_job": "Tech Entrepreneur",
      "company": "Founder of StartupXYZ",
      "quote": "..."
    }
  ]
}
```

---

### 4. Get Angkatan List
**GET** `/api/alumni/angkatan-list`

Mendapatkan daftar angkatan yang tersedia, diurutkan dari yang terbaru.

**Example Request:**
```bash
GET /api/alumni/angkatan-list
```

**Response:**
```json
{
  "status": true,
  "message": "Angkatan list retrieved successfully",
  "data": ["26", "25", "24", "23"]
}
```

---

### 5. Create Alumni (Admin Only)
**POST** `/api/alumni`

Membuat data alumni baru.

**Authentication:** Required (Admin only)

**Headers:**
```
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Body Parameters:**
- `name` (required, string, max: 255) - Nama alumni
- `photo` (optional, file, image, max: 2MB) - Foto alumni
- `angkatan` (required, string, max: 10) - Angkatan alumni
- `current_job` (required, string, max: 255) - Pekerjaan saat ini
- `company` (required, string, max: 255) - Nama perusahaan
- `quote` (optional, text) - Kutipan/testimoni

**Example Request:**
```bash
POST /api/alumni
Content-Type: multipart/form-data

{
  "name": "Reza Pratama",
  "photo": [file],
  "angkatan": "26",
  "current_job": "Tech Entrepreneur",
  "company": "Founder of StartupXYZ",
  "quote": "Semangat kewirausahaan..."
}
```

**Response:**
```json
{
  "status": true,
  "message": "Alumni created successfully",
  "data": {
    "id": 1,
    "name": "Reza Pratama",
    "slug": "reza-pratama",
    "photo": "alumni/1234567890_photo.jpg",
    "angkatan": "26",
    "current_job": "Tech Entrepreneur",
    "company": "Founder of StartupXYZ",
    "quote": "Semangat kewirausahaan..."
  }
}
```

---

### 6. Update Alumni (Admin Only)
**PUT** `/api/alumni/{slug}`

Memperbarui data alumni berdasarkan slug.

**Authentication:** Required (Admin only)

**Headers:**
```
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Body Parameters:**
- `name` (optional, string, max: 255) - Nama alumni
- `photo` (optional, file, image, max: 2MB) - Foto alumni
- `angkatan` (optional, string, max: 10) - Angkatan alumni
- `current_job` (optional, string, max: 255) - Pekerjaan saat ini
- `company` (optional, string, max: 255) - Nama perusahaan
- `quote` (optional, text) - Kutipan/testimoni

**Example Request:**
```bash
PUT /api/alumni/reza-pratama
Content-Type: multipart/form-data

{
  "current_job": "Senior Tech Entrepreneur",
  "quote": "Updated quote..."
}
```

**Response:**
```json
{
  "status": true,
  "message": "Alumni updated successfully",
  "data": {
    "id": 1,
    "name": "Reza Pratama",
    "slug": "reza-pratama",
    "photo": "alumni/1234567890_photo.jpg",
    "angkatan": "26",
    "current_job": "Senior Tech Entrepreneur",
    "company": "Founder of StartupXYZ",
    "quote": "Updated quote..."
  }
}
```

---

### 7. Delete Alumni (Admin Only)
**DELETE** `/api/alumni/{slug}`

Menghapus data alumni berdasarkan slug.

**Authentication:** Required (Admin only)

**Headers:**
```
Authorization: Bearer {token}
```

**Example Request:**
```bash
DELETE /api/alumni/reza-pratama
```

**Response:**
```json
{
  "status": true,
  "message": "Alumni deleted successfully",
  "data": null
}
```

---

## Error Responses

### Validation Error (422)
```json
{
  "status": false,
  "message": "Validation failed",
  "errors": {
    "name": ["The name field is required."],
    "angkatan": ["The angkatan field is required."]
  }
}
```

### Not Found (404)
```json
{
  "status": false,
  "message": "Alumni not found",
  "errors": null
}
```

### Unauthorized (401)
```json
{
  "status": false,
  "message": "Unauthorized",
  "errors": null
}
```

### Server Error (500)
```json
{
  "status": false,
  "message": "Failed to retrieve alumni",
  "errors": "Error details..."
}
```

---

## Features
- ✅ CRUD operations dengan slug-based routing
- ✅ Auto-generate slug dari nama
- ✅ Upload foto alumni
- ✅ Filter berdasarkan angkatan
- ✅ Pencarian berdasarkan nama
- ✅ Pagination
- ✅ Sorting data
- ✅ Protected routes untuk admin
- ✅ Soft delete untuk foto saat update/delete

---

## Notes
- Slug akan otomatis di-generate dari nama alumni saat create
- Slug akan selalu unique dengan menambahkan suffix angka jika duplikat
- Foto akan disimpan di `storage/app/public/alumni/`
- Foto maksimal 2MB dengan format: jpeg, png, jpg, gif
- Foto lama akan otomatis dihapus saat update atau delete alumni
