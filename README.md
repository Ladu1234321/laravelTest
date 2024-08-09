Overview
This project is a simple authentication portal built using Laravel and Statamic. It includes user registration, login, and logout functionality, with a MySQL database for user accounts.

Features
    User registration
    User login and logout
    MySQL database for storing user accounts

Prerequisites
    PHP >= 7.4
    Composer
    MySQL
    Laravel 8 or higher

Clone the Repository
git clone https://github.com/Ladu1234321/laravelTest.git
cd authentication-portal


Install Dependencies
composer install

Here's a basic README file template for your project that includes instructions on setup, usage, and contribution guidelines. Adjust the content to fit the specific details of your project as needed:
Authentication Portal with Statamic & Laravel
Overview

This project is a simple authentication portal built using Laravel and Statamic. It includes user registration, login, and logout functionality, with a MySQL database for user accounts. It also features public and member-only pages.
Features

    User registration
    User login and logout
    Public and member-only pages
    MySQL database for storing user accounts

Prerequisites

    PHP >= 7.4
    Composer
    MySQL
    Laravel 8 or higher


Install Dependencies
composer install

Set Up Environment
cp .env.example .env

Generate Application Key
php artisan key:generate

Run Migrations
php artisan migrate

Start the Development Server
php artisan serve

Usage
    Register: Navigate to /register to create a new user account.
    Login: Navigate to /login to log in with your account credentials.
    Logout: You will be logged out automatically or can log out manually by visiting /logout.
