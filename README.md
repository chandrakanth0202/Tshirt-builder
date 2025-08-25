# 👕 CI T-Shirt Builder

A simple **T-Shirt Customization App** built with **CodeIgniter 4**.  
Users can select T-shirt colors, apply overlay designs, and add items to cart.

---

## 📂 Project Structure

ci-tshirt-builder/
├── app/ # Controllers, Models, Views
│ ├── Controllers/ # Products controller
│ ├── Views/ # builder.php (UI)
├── public/ # Publicly accessible folder
│ ├── assets/
│ │ ├── css/ # Stylesheets
│ │ ├── js/ # Scripts
│ │ └── images/ # Colors & designs
│ └── index.php
├── writable/ # Logs, cache, uploads
├── .env # Environment settings
├── composer.json # Composer dependencies
└── README.md # Project documentation


---

## 🚀 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/ci-tshirt-builder.git
   cd ci-tshirt-builder
   
# Install dependencies:

composer install

# Set environment:

Copy .env.example to .env

Update your app.baseURL in .env:

app.baseURL = 'http://localhost:8080/'

# Start the server:
php spark serve

# Open in browser:

http://localhost:8080

## Features

Select T-shirt base color

Apply overlay design

Preview customizations

Add to cart

Simple CodeIgniter MVC structure

## Tech Stack

Backend: PHP 8+, CodeIgniter 4

Frontend: HTML, CSS, JavaScript

Server: PHP built-in server (spark) or Apache (XAMPP)



