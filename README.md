---

## 🎓 Laravel School Management System (Khmer)

A powerful **School Management System built in Laravel** with Khmer language support. This web application is designed to streamline administrative tasks for schools, including student registration, class management, grading, and reporting — all localized for Khmer-speaking users.

---

### 🌟 Key Features

#### 👨‍🎓 Student Management

* Register, edit, and remove student profiles
* Manage student photos, ID numbers, and academic records
* Class-wise student organization

#### 🧑‍🏫 Teacher & Staff Management

* Add/assign teachers to subjects and classes
* Track attendance and performance
* Staff role & permission management

#### 📚 Academic & Class Management

* Manage grades, subjects, classrooms, and sections
* Assign teachers and subjects to specific grades
* Set academic years and terms

#### 📝 Attendance & Grading

* Daily attendance for students and staff
* Automated grade calculation and report card generation
* Term-wise academic performance tracking

#### 💼 Admin Panel

* Dashboard with statistics (students, classes, staff)
* Role-based access control for Admin, Teacher, Accountant, etc.
* Khmer and English language support

#### 📄 Reports & Print

* Generate printable student lists, attendance sheets, and report cards
* Export data in PDF format

---

### 🛠️ Technologies Used

| Layer        | Stack                      |
| ------------ | -------------------------- |
| Framework    | Laravel (PHP)              |
| Frontend     | Blade Templates, Bootstrap |
| Backend      | PHP 8.x with Laravel 9.x+  |
| Database     | MySQL                      |
| Localization | Khmer Language Support     |
| Extras       | jQuery, AJAX, FontAwesome  |

---

### 📷 Demo & Screenshots

> View interface demos and screenshots of the system.

* 📁 [View Picture Demo (Google Drive / GitHub)](https://github.com/Din-Rasin/Laravel-School-Management-System-Khmer/tree/main/screenshots)
  *(If available, add screenshots folder to repo)*

---

### 📦 Installation Guide

> Prerequisites: PHP 8+, Composer, MySQL, Laravel CLI

1. **Clone the repository**

   ```bash
   git clone https://github.com/Din-Rasin/Laravel-School-Management-System-Khmer.git
   cd Laravel-School-Management-System-Khmer
   ```

2. **Install dependencies**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Create `.env` file**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure your `.env` file**

   * Set database credentials
   * (Optional) Set mail configs

5. **Run migrations & seeders**

   ```bash
   php artisan migrate --seed
   ```

6. **Run the server**

   ```bash
   php artisan serve
   ```

7. **Access the system**

   * URL: `http://localhost:8000`
   * Default login (if seeded):

     ```
     Email: admin@example.com
     Password: password
     ```

---

### 🗂️ Modules Overview

* Student & Class Management
* Grade & Subject Setup
* Teacher Assignment
* Daily Attendance
* Report Cards
* Khmer Localization
* Admin Dashboard

---

### 🔐 Role-Based Access (RBAC)

| Role    | Access Areas                    |
| ------- | ------------------------------- |
| Admin   | Full system control             |
| Teacher | Class & student grading         |
| Staff   | Attendance, finance (optional)  |
| Student | View profile, grades (optional) |

---

### 🧩 Future Features (Planned)

* 🧾 Fee & Payment Management
* 📚 Library Module
* 🏫 Timetable Scheduling
* 🗂️ Document Upload for students
* 🔔 Notifications & Messaging

---

### 🤝 Contributing

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/your-feature`
3. Commit your changes
4. Push and open a Pull Request

---

### 📄 License

This project is open-source and available under the **MIT License**.

---

### 📬 Contact

* 🔗 GitHub: [Din-Rasin](https://github.com/Din-Rasin)
* 📧 Email: denrasin2917@gmail.com (if public)

---


