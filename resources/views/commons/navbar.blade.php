
<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">BABY LOG</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    @if (Request::route('baby')) 
                    {{-- 各ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('babies.show', 'Mypage', ['baby' => Request::route('baby')], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('logs.index', 'History', ['baby' => Request::route('baby')], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('averages.index', 'Average', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <li class="nav-link dropdown-toggle" data-toggle="dropdown">Setting</li>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- 編集ページと子ども追加登録ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('babies.edit', 'Edit register', ['baby' => Request::route('baby')]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('babies.create', 'Add baby', ['baby' => Request::route('baby')]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                    @else
                    {{-- ログアウトへのリンク --}}
                    <li class="nav-item">{!! link_to_route('logout.get', 'Logout'), ['class' => 'nav-link'] !!}</li>
                    @endif
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>