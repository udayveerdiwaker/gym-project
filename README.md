# Gym Management System

## 📌 Overview
The Gym Management System is a **PHP & MySQL-based web application** that helps manage gym members, trainers, plans, attendance, and payments.  
It includes two panels:
- **Admin Panel** – for gym management
- **User Panel** – for members to track their activities

---

## 🗂️ Folder Structure
```
gym-project/
├─ assets/          # CSS & JS files
├─ config/          # Database connection
├─ includes/        # Shared header/footer
├─ admin/           # Admin panel pages
├─ user/            # User panel pages
├─ db.sql           # Database schema
├─ index.php        # Main entry point
└─ README.md        # Project documentation
```

---

## ⚙️ Features
### 👨‍💼 Admin Panel
- Login/Logout
- Dashboard
- Manage Members (Add, Edit, Delete)
- Manage Trainers
- Manage Plans
- Track Attendance
- Manage Payments

### 🧑‍🤝‍🧑 User Panel
- Register/Login
- Dashboard
- View Profile
- View Attendance
- View Payment History

---

## 🛠️ Requirements
- PHP >= 7.4
- MySQL >= 5.7
- Apache/Nginx Server
- Browser (Chrome/Firefox/Edge)

---

## 🚀 Installation
1. Clone or download this repository.
2. Import `db.sql` into your MySQL database.
3. Update database credentials in `config/connection.php`.
4. Place the project in your server root (e.g., `htdocs/` for XAMPP).
5. Start your local server and open in browser:
   http://localhost/gym-project/

---

## 🔑 Default Login (Sample)
- **Admin**
  - Email: `admin@gym.com`
  - Password: `admin123`

- **User**
  - Email: `user@gym.com`
  - Password: `user123`

---

## ✨ Future Enhancements
- Online Payment Integration
- Membership Renewal Alerts
- Workout & Diet Plan Tracking
- Reports & Analytics

---

## 📜 License
This project is open-source and free to use for educational purposes.
