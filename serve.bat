@echo off
REM Laravel Development Server Launcher for Windows
REM Runs Laravel on http://localhost:8000

echo.
echo ========================================
echo TastyFood - Laravel Development Server
echo ========================================
echo.
echo Starting Laravel development server...
echo Access the application at: http://localhost:8000
echo Admin Panel: http://localhost:8000/admin
echo Login: admin@gmail.com / 123456
echo.
echo Press Ctrl+C to stop the server
echo.

php artisan serve --host=127.0.0.1 --port=8000

pause
