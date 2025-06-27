<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'My Contacts App')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <header>
            <nav>
                <a href="{{ route('contacts.index') }}">Home</a> |
                <a href="{{ route('contacts.create') }}">Add Contact</a>
            </nav>
        </header>

        <main>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>

        <footer>
            <hr/>
            <p>© {{ date('Y') }} My Contacts App | Alfasoft</p>
        </footer>
    </body>
</html>
