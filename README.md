
# Noxur Web Services

## Prerequisites

  

Before you start, ensure you have the following installed:

  

1.  **PHP 8.2+** (PHP 8.0 or higher recommended)

2.  **Composer** - PHP dependency manager

3.  **MySQL** (or any other database Laravel supports)

  

## Step 1: Clone the Project

  

Clone the repository to your local machine:

  


```bash
git clone https://github.com/noxur05/nws.git

cd nws

composer install

php artisan migrate:fresh --seed

php artisan schedule:run
```

## 🚨 Caution
Do not command:
```bash
php artisan serve
```
It won't start task for Billing Records


