RESTAURANT RESERVATION SYSTEM


The Restaurant Reservation Website is designed to streamline the process of booking tables at a restaurant and reservation management by Owners. This project allows customers to make reservations online, view their reservation history, and leave reviews. The admin can manage reservations, settings, and view analytics related to reservations.
Project Setup/Installation Instructions

Dependencies:

    PHP 8.0.12
    Laravel 9
    MySQL
    Composer
    Node.js and npm

Installation Steps:

    Clone the repository
    Navigate to the project directory
    Install the PHP dependencies
    Install the Node.js dependencies
    Copy the .env.example file to .env and update the environment variables
    Generate an application key
    Run the database migrations
    Seed the database 
    Start the development server


Usage Examples:

    Making a Reservation:
        Navigate to the reservation page.
        Select the date and time for your reservation.
        Enter the number of guests.
        Submit the reservation form.

    Viewing Reservations:
        Log in to your account.
        Go to the "My Reservations" section to view your reservation history.

    Leaving a Review:
        After attending your reservation, navigate to the "Reviews" section.
        Select the reservation you want to review.
        Rate and leave your comments.

Input/Output:

    Input:
        Reservation Date and Time
        Number of Guests
        Review Rating and Comments
    Output:
        Reservation Confirmation
        List of Reservations
        Review Confirmation

Project Structure
Overview:

    app/ - Contains the application logic.
    config/ - Configuration files.
    database/ - Database migrations and seeders.
    public/ - Public assets and the entry point for the web server.
    resources/ - Views, assets, and language files.
    routes/ - Route definitions.
    tests/ - Automated tests.

Key Files:

    app/Http/Controllers/Frontend/ReservationController.php - Handles reservation logic.
    app/Http/Controllers/Auth/PasswordResetLinkController.php - Handles password reset logic.
    app/Models/ReservationSetting.php - Defines the reservation settings model.
    database/migrations/xxxx_xx_xx_create_reservation_settings_table.php - Migration for the reservation settings table.
    resources/views/ - Contains Blade templates for the frontend.

Project Status: In Progress

Known Issues: Validation errors when parsing datetime inputs.
              Some user interface elements need refinement for better user experience.

Acknowledgements: Laravel framework documentation.
                  Tutorials from Laracasts and other online resources.

This project is licensed under the MIT License. See the LICENSE file for details.
