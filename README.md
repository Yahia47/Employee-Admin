# Employee - Admin

## 🚀 Project Overview

This project is built with **Laravel + Filament + Spatie**.  
It contains two separate panels:

-   **Admin Application** → manage employees, roles, permissions .
-   **Employee Application** → staff access with dynamic permissions, and countries manager.

---

## 🔑 Features

### 1. Admin Application

-   Manage Employees (CRUD: name, email, password, role).
-   Roles & Permissions (dynamic using [spatie/laravel-permission](https://spatie.be/docs/laravel-permission) with Filament integration).

### 2. Employee Application

-   Test Pages to validate role/permission access.
-   Countries Manager:
    -   Fetch countries from REST API (`restcountries.com`).
    -   Search country by name.
    -   Store new countries in DB.
    -   JSON file also available for offline/local data.

---

## ⚙️ Installation

1. Clone repo:
    ```bash
    git clone https://github.com/Yahia47/Employee-Admin.git
    cd talla-assessment
    ```
2. Install dependencies:
    ```bash
       composer install
      composer require filament/filament
      php artisan filament:install --panels
     npm install && npm run build
    ```
3. Setup .env:

    ```bash
    Copy this in the file .env
       DB connection
       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=talla_db
       DB_USERNAME=root
       DB_PASSWORD= your password

    ```

4. Run migrations & seeders:
    ```bash
    php artisan migrate --seed

    ```
5. Serve Run server :
    ```bash
    php artisan serve
    ```
6. 📂 Roles & Permissions :

-   I used spatie/laravel-permission because it is well-supported, Filament-compatible, and allows dynamic role/permission management without hardcoding.

7. 🌍 Countries Manager :

    - Fetch from API: https://restcountries.com/v3.1/all
    - Search by name: https://restcountries.com/v3.1/name/{name}
    - Store in DB (separate countries table).
    - JSON file fallback (for offline testing).
