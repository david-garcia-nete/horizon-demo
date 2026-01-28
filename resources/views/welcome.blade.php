<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
            body {
                font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
                background-color: #f8fafc;
                color: #1f2937;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                margin: 0;
            }
            .card {
                background: #ffffff;
                border-radius: 0.75rem;
                padding: 2.5rem;
                box-shadow: 0 10px 25px rgba(15, 23, 42, 0.1);
                text-align: center;
            }
            h1 {
                margin-bottom: 0.5rem;
            }
            p {
                margin: 0;
                color: #64748b;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h1>Laravel</h1>
            <p>Welcome to your new application.</p>
        </div>
    </body>
</html>
