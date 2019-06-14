    <header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/">Mycat-Movies <i class="fas fa-paw"></i></a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav" data-toggle="tooltip" data-placement="right">
                @if (Auth::check())
                    <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="動画のアップロード">
                        <a href="http://09dd90aa18ac4384bb62c496279e75b7.vfs.cloud9.us-east-1.amazonaws.com/movies/create" class="nav-link"><i class="fas fa-video"></i></a>
                    </li>
                    
                    {{--<li class="nav-item">{!! link_to_route('movies.create', '', [], ['class' => 'nav-link']) !!}<i class="fas fa-video"></i></li>--}}
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="ユーザ一覧">
                        <a href="http://09dd90aa18ac4384bb62c496279e75b7.vfs.cloud9.us-east-1.amazonaws.com/users" class="nav-link"><i class="fas fa-user-friends"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', 'マイページ', ['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>