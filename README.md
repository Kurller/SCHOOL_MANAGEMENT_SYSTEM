# 🎓 School Management System

A modern, role-based **School Management System** built with **Laravel 12**, designed to simplify the management of students, teachers, classes, attendance, results, fees, and school administration.

The system provides separate dashboards and permissions for **Administrators, Principals, Teachers, Accountants, Students, Parents**, ensuring secure access to school resources.

---

# 🚀 Live Demo

**Application**

> https://school-management-system-tlwx.onrender.com

> **Note**
>
> This project is hosted on the **Render Free Plan** using a free cloud database.
>
> If the demo becomes unavailable because the free database expires, please refer to the YouTube demonstration below.

---

# 🎥 Project Walkthrough

A complete walkthrough of the application is available here:

**YouTube Demo**

> https://youtu.be/hvSwedKLQyI

The video demonstrates:

- User Authentication
- Role Based Access Control
- Student Management
- Teacher Management
- Class Management
- Subject Management
- Attendance
- Results
- Fees
- Parent Portal
- Student Portal
- Report Cards
- School Settings

---


---

# ✨ Features

## Authentication

- Login
- Forgot Password
- Password Reset
- Profile Management

---

## Role Based Access Control (RBAC)

Roles include:

- Administrator
- Principal
- Teacher
- Accountant
- Student
- Parent

Each role has its own permissions and dashboard.

---

## Student Management

- Register students
- Edit student information
- Student profile
- Student enrollment
- Parent assignment

---

## Teacher Management

- Add teachers
- Assign teachers to classes
- Assign teachers to subjects

---

## Class Management

- Create classes
- Assign class teachers
- Manage class subjects

---

## Subject Management

- Create subjects
- Assign subjects to classes

---

## Attendance

- Take attendance
- View attendance history
- Attendance reports

---

## Results

- Enter examination scores
- Automatic grading
- Position calculation
- Report card generation

---

## Fees

- Fee records
- Payment tracking
- Outstanding balances

---

## Parent Portal

Parents can:

- View children
- View results
- View attendance
- View report cards
- View fees

---

## Student Portal

Students can:

- View results
- View report cards
- View attendance
- View fees

---

## Reports

- PDF Export
- Excel Export

---

## School Settings

- School information
- Logo upload
- Signature upload

---

# 🛠 Built With

- Laravel 12
- PHP 8.2
- MySQL
- Blade
- Bootstrap
- Docker
- Nginx
- PHP-FPM
- Composer

---

# 📂 Project Structure

```
school_management/
│
├── app/
├── bootstrap/
├── config/
├── database/
├── docker-compose.yml
├── Dockerfile
├── nginx.conf
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── vendor/
└── README.md
```

---

# ⚙️ Installation

## Clone Repository

```bash
git clone https://github.com/YOUR_USERNAME/school-management.git

cd school-management
```

---

## Install Dependencies

```bash
composer install
```

---

## Copy Environment File

```bash
cp .env.example .env
```

Windows

```bash
copy .env.example .env
```

---

## Generate Application Key

```bash
php artisan key:generate
```

---

## Configure Database

Update your `.env`

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=school_management
DB_USERNAME=root
DB_PASSWORD=
```

---

## Run Migrations

```bash
php artisan migrate
```

---

## Seed Database (Optional)

```bash
php artisan db:seed
```

---

## Start Development Server

```bash
php artisan serve
```

Open

```
http://127.0.0.1:8000
```

---

# 🐳 Docker Setup

## Requirements

- Docker Desktop
- Docker Compose

---

## Build Containers

```bash
docker compose build
```

---

## Start Containers

```bash
docker compose up -d
```

---

## Verify Containers

```bash
docker compose ps
```

---

## Stop Containers

```bash
docker compose down
```

---

## View Logs

```bash
docker compose logs
```

---

## Execute Commands Inside Container

```bash
docker compose exec app bash
```

Example

```bash
php artisan migrate

php artisan optimize:clear

composer install
```

---

# Docker Architecture

```
                Browser
                    │
                    ▼
               Nginx Container
                    │
                    ▼
             PHP-FPM Container
                    │
                    ▼
               Laravel 12
                    │
                    ▼
            MySQL Database
```

---

# Deployment

This application can be deployed on

- Render
- Railway
- DigitalOcean
- AWS
- Azure
- Google Cloud
- VPS with Docker

---

# Environment Variables

Example

```env
APP_NAME=School Management System

APP_ENV=production

APP_DEBUG=false

APP_URL=https://your-domain.com

DB_CONNECTION=mysql

DB_HOST=

DB_PORT=

DB_DATABASE=

DB_USERNAME=

DB_PASSWORD=

MAIL_MAILER=smtp

MAIL_HOST=smtp.gmail.com

MAIL_PORT=587

MAIL_USERNAME=

MAIL_PASSWORD=
```

---

# Testing

Run tests

```bash
php artisan test
```

---

# Security

Never commit

- `.env`
- Database credentials
- API Keys
- Mail passwords

---

# Future Improvements

- SMS Notifications
- Online Fee Payment
- Mobile Application
- Multi-school (SaaS)
- Timetable Generator
- AI Student Assistant
- AI Report Generator
- Biometric Attendance
- REST API
- GraphQL API

---

# Known Limitation

The public demo is hosted on **Render Free Plan** with a **free cloud database**.

Free cloud databases may expire or become inactive after a period of inactivity.

If the hosted demo is unavailable, please watch the full application walkthrough here:

**YouTube**

https://youtube.com/YOUR_VIDEO_LINK

The source code remains fully functional and can be run locally using the installation or Docker instructions provided above.

---

# Contributing

Pull requests are welcome.

For major changes, please open an issue first to discuss the proposed change.

---

# License

This project is released under the MIT License.

---

# Author

**Kolawole Oladejo**

Backend Software Engineer

GitHub:
https://github.com/Kurller

LinkedIn:
https://linkedin.com/in/kolaquadry

Email:
YOUR_EMAIL
