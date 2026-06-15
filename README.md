# 📚 Bookstore REST API

## 📌 Project Overview

A RESTful API for a Bookstore built with **Laravel (PHP)**. Supports full CRUD operations on books, with validation, pagination, and search functionality.

Built as part of a backend internship to understand real-world API development — routing, database handling, and API testing with Postman.

---

## ⚙️ Technologies Used

| Technology | Purpose |
|---|---|
| Laravel (PHP Framework) | Backend API development |
| MySQL | Database |
| PHP | Server-side language |
| Postman | API testing |
| Git & GitHub | Version control |

---

## 🚀 How to Run Locally

### 1. Clone the repository
```bash
git clone https://github.com/maryam753/bookstore-api.git
cd bookstore-api
```

### 2. Install dependencies
```bash
composer install
```

### 3. Setup environment file
Copy `.env.example` to `.env` and update database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookstore
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate app key
```bash
php artisan key:generate
```

### 5. Run migrations
```bash
php artisan migrate
```

### 6. Start the development server
```bash
php artisan serve
```

App will be running at: **http://127.0.0.1:8000**

---

## 📡 API Endpoints

Base URL: `http://127.0.0.1:8000/api`

| Method | Endpoint | Description |
|---|---|---|
| POST | `/books` | Create a new book |
| GET | `/books?page=1` | Get all books (paginated) |
| GET | `/books/{id}` | Get a single book |
| PUT | `/books/{id}` | Update a book |
| DELETE | `/books/{id}` | Delete a book |
| GET | `/books?title=keyword` | Search books by title |

---

### ➕ 1. Create Book

**POST** `/api/books`

**Sample Input:**
```json
{
  "title": "Atomic Habits",
  "author": "James Clear",
  "price": 20,
  "isbn": "123456",
  "publishedDate": "2018-10-16"
}
```

**Sample Output:**
```json
{
  "message": "Book created successfully",
  "data": {
    "id": 1,
    "title": "Atomic Habits",
    "author": "James Clear",
    "price": 20,
    "isbn": "123456",
    "publishedDate": "2018-10-16",
    "created_at": "2025-01-01T10:00:00Z"
  }
}
```

---

### 📚 2. Get All Books (Paginated)

**GET** `/api/books?page=1`

**Sample Output:**
```json
{
  "data": [
    {
      "id": 1,
      "title": "Atomic Habits",
      "author": "James Clear",
      "price": 20,
      "isbn": "123456",
      "publishedDate": "2018-10-16"
    },
    {
      "id": 2,
      "title": "Deep Work",
      "author": "Cal Newport",
      "price": 18,
      "isbn": "789012",
      "publishedDate": "2016-01-05"
    }
  ],
  "current_page": 1,
  "per_page": 10,
  "total": 2
}
```

---

### 🔍 3. Get Single Book

**GET** `/api/books/{id}`

**Sample Output:**
```json
{
  "data": {
    "id": 1,
    "title": "Atomic Habits",
    "author": "James Clear",
    "price": 20,
    "isbn": "123456",
    "publishedDate": "2018-10-16"
  }
}
```

**Error (Not Found):**
```json
{
  "message": "Book not found"
}
```

---

### ✏️ 4. Update Book

**PUT** `/api/books/{id}`

**Sample Input:**
```json
{
  "title": "Atomic Habits (Revised)",
  "author": "James Clear",
  "price": 25,
  "isbn": "123456",
  "publishedDate": "2018-10-16"
}
```

**Sample Output:**
```json
{
  "message": "Book updated successfully",
  "data": {
    "id": 1,
    "title": "Atomic Habits (Revised)",
    "author": "James Clear",
    "price": 25,
    "isbn": "123456",
    "publishedDate": "2018-10-16"
  }
}
```

---

### ❌ 5. Delete Book

**DELETE** `/api/books/{id}`

**Sample Output:**
```json
{
  "message": "Book deleted successfully"
}
```

---

### 🔎 6. Search Books by Title

**GET** `/api/books?title=atomic`

**Sample Output:**
```json
{
  "data": [
    {
      "id": 1,
      "title": "Atomic Habits",
      "author": "James Clear",
      "price": 20
    }
  ]
}
```

---

## ✅ Project Status

| Feature | Status |
|---|---|
| CRUD Operations | ✔ Complete |
| Input Validation | ✔ Complete |
| Pagination | ✔ Complete |
| Search Feature | ✔ Complete |
| Error Handling | ✔ Complete |

---

## 👩‍💻 Author

**Maryam** — Backend Internship Project  
GitHub: [@maryam753](https://github.com/maryam753)
