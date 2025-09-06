# 📺 Streamify – Online OTT Platform (PHP Based)

> Fully working PHP + MySQL OTT website with login, registration, watchlist, live search, and a responsive Bootstrap UI.

---

## 🌟 Highlights
- Secure **user auth** with PHP sessions (login, register, logout)
- **Watchlist** add/remove (persisted in MySQL)
- **Live search** for movies, series, and actors
- **Responsive UI** with Bootstrap (mobile-first)
- Clean project structure and clear PHP routes
- Beginner-friendly setup using **XAMPP** (Apache + MySQL)

---

## 🧰 Tech Stack
- **Backend:** PHP (procedural), MySQL
- **Frontend:** HTML, CSS, JavaScript, Bootstrap (offline-ready)
- **Server/Local:** XAMPP (Apache + MySQL)
- **Auth:** PHP sessions

---

## 📦 Folder Structure
```
Streamify/
├─ index.php                     # Home page (browse content, search)
├─ login.php                     # User login
├─ register.php                  # User sign-up
├─ userdash.php                  # User dashboard (watchlist)
├─ add_to_watchlist.php          # Add item to watchlist (POST)
├─ remove_from_watchlist.php     # Remove item from watchlist (POST)
├─ logout.php                    # End session
├─ /assets/
│  ├─ /css/                      # Stylesheets
│  ├─ /js/                       # JavaScript files
│  └─ /img/                      # Images / thumbnails
└─ /database/
   └─ database.sql               # Schema + seed data
```

---

## ⚡ Quick Start (Local with XAMPP)
1. Clone the repo:
   ```bash
   git clone https://github.com/your-username/streamify.git
   ```
2. Move the folder to: `C:/xampp/htdocs/streamify`
3. Start **Apache** and **MySQL** in XAMPP.
4. Open **phpMyAdmin** → create database `online_ott` → import `database/database.sql`.
5. Set DB credentials in your PHP files if needed:
   ```php
   $conn = new mysqli('localhost', 'root', '', 'online_ott');
   ```
6. Visit in browser: `http://localhost/streamify`

---

## 🗃️ Minimal Database Schema (snippet)
```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  email VARCHAR(120) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE content (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(120) NOT NULL,
  type ENUM('movie','series') NOT NULL,
  poster VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE watchlist (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  content_id INT NOT NULL,
  added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY unique_user_content (user_id, content_id),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (content_id) REFERENCES content(id) ON DELETE CASCADE
);
```

---

## 🧩 Example HTML (Movie Card)
```html
<!-- Card: movie/series item -->
<div class="col-md-3 mb-4">
  <div class="card h-100 shadow-sm">
    <img src="assets/img/posters/inception.jpg" class="card-img-top" alt="Inception Poster">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title mb-1">Inception</h5>
      <p class="text-muted small mb-3">Movie • Sci-Fi • 2h 28m</p>
      <button 
        class="btn btn-primary mt-auto add-to-watchlist" 
        data-id="42">
        + Add to My List
      </button>
    </div>
  </div>
</div>
```

---

## 🎨 Example CSS (assets/css/style.css)
```css
/* Global */
body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif; }
.navbar-brand { font-weight: 700; letter-spacing: .5px; }

/* Cards */
.card { border-radius: 1rem; overflow: hidden; }
.card-img-top { object-fit: cover; height: 320px; }
.card-title { font-size: 1rem; }

/* Watchlist button states */
.btn.added { background: #198754; border-color: #198754; }
.btn.added::before { content: "✔ "; }

/* Search */
.search-input { border-radius: 999px; padding: .6rem 1rem; }
```

---

## 🧠 Example JS (assets/js/app.js)
```js
// Add to watchlist (basic POST)
document.addEventListener("click", async (e) => {
  if (!e.target.matches(".add-to-watchlist")) return;
  const btn = e.target;
  const id = btn.getAttribute("data-id");

  try {
    const res = await fetch("add_to_watchlist.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: "content_id=" + encodeURIComponent(id)
    });
    const data = await res.json();
    if (data.success) {
      btn.classList.add("added");
      btn.textContent = "Added to My List";
    } else {
      alert(data.message || "Please log in first.");
    }
  } catch (err) {
    console.error(err);
    alert("Something went wrong.");
  }
});
```

---

## 🔐 Simple Login Handler (login.php snippet)
```php
<?php
session_start();
require_once 'database/conn.php'; // creates $conn (mysqli)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  $stmt = $conn->prepare("SELECT id, name, password_hash FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    header("Location: userdash.php");
    exit;
  }

  $error = "Invalid email or password.";
}
?>
```

---

## 🔎 Live Search (index.php snippet)
```php
<?php
// Quick search handler (simplified)
$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q !== '') {
  $stmt = $conn->prepare("SELECT * FROM content WHERE title LIKE CONCAT('%', ?, '%') ORDER BY created_at DESC");
  $stmt->bind_param("s", $q);
  $stmt->execute();
  $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>
```

---

## ✅ Features Checklist
- [x] Register / Login / Logout
- [x] Add to / Remove from Watchlist
- [x] Live Search (movies, series, actors)
- [x] Responsive UI (Bootstrap)
- [x] Session-based auth
- [ ] Admin panel (optional future)
- [ ] Streaming player integration (future)

---

## 🙌 Contributing
Pull requests are welcome! For major changes, open an issue first to discuss what you’d like to change.

---

## 📄 License
This project is released under the MIT License. See `LICENSE` for details.

---

## 👤 Author
**Brijesh Verma** (aka *Programmer Brijesh*)  
Email: your-email@example.com  
LinkedIn/Portfolio: https://your-portfolio.example

---

### 🔖 Short Repo Description (≤ 350 chars for GitHub "About")
Streamify is a fully working PHP-based Online OTT Platform with login/registration, watchlist, live search, and a responsive Bootstrap UI. Built using PHP, MySQL, HTML, CSS, and JavaScript, it demonstrates complete backend + frontend integration for a real OTT experience.
