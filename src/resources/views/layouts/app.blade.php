<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>FashonablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    @yield('css')
</head>
<body>
    @if (!View::hasSection('no_header'))
    <header class="header">
        <div class="header__inner">
             <a class="header__logo" href="/">FashonablyLate</a>
             @yield('header')
        </div>
    </header>
    @endif

    <main>
        @yield('content')
    </main>
    
    @yield('scripts')
    
</body>
</html>