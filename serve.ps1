#!/usr/bin/env pwsh
# Laravel Development Server Launcher
# Runs Laravel on http://localhost:8000

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "TastyFood - Laravel Development Server" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Starting Laravel development server..." -ForegroundColor Yellow
Write-Host "Access the application at: http://localhost:8000" -ForegroundColor Green
Write-Host "Admin Panel: http://localhost:8000/admin" -ForegroundColor Green
Write-Host "Login: admin@gmail.com / 123456" -ForegroundColor Green
Write-Host ""
Write-Host "Press Ctrl+C to stop the server" -ForegroundColor Yellow
Write-Host ""

php artisan serve --host=127.0.0.1 --port=8000
