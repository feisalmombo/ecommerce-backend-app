## E-commerce Backend Project
This e-commerce application combines the powerful capabilities of Laravel and Vue.js 3 to deliver a robust and interactive shopping experience. By utilizing Laravel Sanctum for authentication, the application ensures secure user management and seamless integration between the frontend and backend.

- This project is a modern e-commerce application built using Laravel as the backend framework and Vue.js 3 for the frontend. It leverages Laravel Sanctum for authentication to provide secure user login and registration functionalities.

## Backend (Laravel)

1. Product Management:
. Implements CRUD (Create, Read, Update, Delete) operations for managing products.
. Stores product details including name, description, and prrice.

2. User Management:
.Allows user registration and login using Laravel Sanctum for secure authentication.
.Manages user profiles and their data.

3. Cart Management:
.Facilitates adding products to the cart, updating quantities, and removing items.
.Stores cart information associated with user sessions.

4. Order Management:
.Handles the checkout process, creating and managing orders.
.Provides order history and detailed order views for users.

5. Authentication:
.Uses Laravel Sanctum to secure user authentication and maintain session state.
.Protects API routes to ensure only authenticated users can access specific endpoints.


## Frontend (Vue.js 3)

1. Product Listing and Details:
.Displays products with detailed views, including product name, descriptions, and prices.
.Implements search and filter functionalities for easy product discovery.

2. Shopping Cart:
.Manages the shopping cart state, allowing users to add, update, and remove items.
.Provides a user-friendly interface for reviewing and managing cart contents.

3. User Authentication:
.Implements login and registration forms with validation.
.Protects routes that require authentication, ensuring only logged-in users can access certain pages.

4. Order Checkout:
.Manages the checkout process, collecting shipping information and payment details.
.Provides confirmation and order summary pages.

5. User Profile:
.Allows users to view and update their personal information and order history.
.Provides a secure interface for managing user accounts.

## Authentication with Laravel Sanctum
1. Token-Based Authentication: 
Laravel Sanctum provides a lightweight API authentication system using tokens. Users receive a token upon login, which is used to authenticate subsequent requests.

2. SPA Authentication: Sanctum is designed to provide a seamless authentication experience for single-page applications (SPAs) built with Vue.js.

3. Session Management: Sanctum maintains session state to keep users logged in across multiple pages and interactions.
