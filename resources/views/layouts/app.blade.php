<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BikePath')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; background: #0b1020; color: #e2e8f0; }
        a { color: #38bdf8; text-decoration: none; }
        nav {
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;
            padding: 14px 32px; border-bottom: 1px solid #1e293b;
        }
        .brand { font-size: 24px; font-weight: 800; font-style: italic; color: #38bdf8; }
        .menu { display: flex; align-items: center; flex-wrap: wrap; gap: 18px; }
        .menu a, .menu button.linklike { color: #cbd5e1; font-size: 15px; }
        .menu a:hover, .menu button.linklike:hover { color: #38bdf8; }
        button.linklike { background: none; border: 0; padding: 0; cursor: pointer; font-family: inherit; }
        main { max-width: 1000px; margin: 0 auto; padding: 28px 20px; }
        h1 { margin: 0 0 6px; }
        .sub { margin: 0 0 24px; color: #94a3b8; }
        .alert { padding: 12px 16px; border-radius: 10px; margin-bottom: 18px; font-size: 14px; }
        .alert.ok { background: #052e16; border: 1px solid #16a34a; color: #bbf7d0; }
        .alert.err { background: #3b0a0a; border: 1px solid #dc2626; color: #fecaca; }
        .alert ul { margin: 0; padding-left: 18px; }
        .box { background: #131a2e; border: 1px solid #1e293b; border-radius: 16px; padding: 24px; }
        .narrow { max-width: 460px; margin: 0 auto; }
        label { display: block; margin: 14px 0 6px; font-size: 14px; color: #94a3b8; }
        input, select, textarea {
            width: 100%; padding: 10px 12px; border-radius: 10px; border: 1px solid #334155;
            background: #0b1020; color: #e2e8f0; font-size: 15px; font-family: inherit;
        }
        input:focus, select:focus, textarea:focus { outline: 2px solid #3b82f6; }
        .check { display: flex; align-items: center; gap: 8px; margin-top: 14px; }
        .check input { width: auto; }
        .check label { margin: 0; }
        .btn {
            display: inline-block; margin-top: 20px; padding: 10px 20px; border: 0; border-radius: 10px;
            background: #3b82f6; color: #fff; font-size: 15px; font-weight: 700; cursor: pointer;
        }
        .btn:hover { background: #2563eb; }
        .btn.full { width: 100%; }
        .btn.ghost { background: transparent; border: 1px solid #334155; color: #cbd5e1; }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-bottom: 24px; }
        .stat { background: #131a2e; border: 1px solid #1e293b; border-top: 4px solid #3b82f6; border-radius: 16px; padding: 18px; }
        .stat .n { font-size: 34px; font-weight: 800; color: #fff; }
        .stat .t { color: #94a3b8; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { text-align: left; padding: 10px 8px; border-bottom: 1px solid #1e293b; }
        th { color: #94a3b8; font-weight: 600; }
        .muted { color: #94a3b8; }
        @yield('style')
    </style>
</head>
<body>
    <nav>
        <a class="brand" href="/">BIKEPATH</a>
        <div class="menu">
            <a href="/jalur-sepeda">Jalur Sepeda</a>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('jalur.create') }}">Tambah Jalur</a>
                <a href="{{ route('profile') }}">Profil ({{ Auth::user()->name }})</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="linklike">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <main>
        @if (session('success'))
            <div class="alert ok">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert err">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>