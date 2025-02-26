# Wardrobe Management System

## Overview
Wardrobe Management is a job application web app designed to help users manage their clothing items while integrating essential job application features. This project includes authentication, profile management, and clothing inventory tracking with a user-friendly interface.

## Features Implemented

### 1. **Authentication (Login & Register)**
- Users can register an account and log in securely.
- Authentication is handled using modern security best practices.
- Session management ensures a seamless experience across sessions.

### 2. **Clothing Items Management**
- Users can add, edit, and delete clothing items.
- Items can be categorized by type (e.g., tops, bottoms, shoes, accessories).
- A search and filter functionality allows users to find specific clothing items.

### 3. **Profile Management**
- Users can update their personal details.
- A profile page provides access to account settings.

### 4. **MySQL Database Integration**
- MySQL is used to store user accounts, clothing items, and other relevant data.
- Database interactions are handled efficiently to ensure fast response times.

### 5. **Dark Mode Support**
- The UI features dark mode with improved contrast for better readability.
- Bright text colors complement the dark mode for an enhanced user experience.

### 6. **Responsive Design**
- The app is fully responsive, ensuring a seamless experience on both desktop and mobile devices.

## Tech Stack Used

- **Frontend:** Vue.js (Vue 3 with Composition API)
- **Backend:** Laravel (for API and authentication)
- **Database:** MySQL
- **Routing & State Management:** Inertia.js & Vue Router
- **Styling:** Tailwind CSS for a modern and clean UI
- **Authentication:** Laravel Sanctum for secure authentication

## Installation and Running the Project

### Prerequisites
Ensure you have the following installed:
- Node.js & npm
- PHP & Composer
- MySQL Database

### Setup Instructions

1. **Clone the Repository**
   ```sh
   git clone https://github.com/your-repository.git
   cd your-repository
   ```

2. **Install Backend Dependencies**
   ```sh
   composer install
   ```

3. **Set Up Environment Variables**
   - Copy `.env.example` to `.env`
   ```sh
   cp .env.example .env
   ```
   - Update database credentials in `.env`
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Run Migrations**
   ```sh
   php artisan migrate --seed
   ```

5. **Install Frontend Dependencies**
   ```sh
   npm install
   ```

6. **Build and Run the Application**
   ```sh
   npm run dev
   php artisan serve
   ```

7. **Access the Application**
   Open your browser and visit:
   ```
   http://127.0.0.1:8000
   ```

## Screenshots
Screenshots of the different screens have been added to the project to showcase the UI and functionality.

## Conclusion
This project is a fully functional wardrobe management application integrated with job application features. With authentication, profile management, and a MySQL-backed database, users can efficiently manage their clothing inventory. 

For any issues, feel free to open a discussion or raise an issue in the repository. 🚀

