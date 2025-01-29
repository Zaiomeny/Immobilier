<div>
    @if (Route::has('login'))
    <div class="page-header fixed">
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color:#303549 !important;">
            <a class="navbar-brand" href="#">
                <x-application-logo />
            </a>
            <ul class="navbar-nav ml-auto pr-2">
                @auth
                    <li class="nav-item">
                        <a wire:navigate href="{{ url('/dashboard') }}"
                            class="btn btn-mini text-menu mt-1">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" 
                            class="btn btn-mini text-menu mt-1">Log
                            in</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}"
                                class="btn btn-mini text-menu mt-1 ml-2">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </nav>
    </div>
@endif
<div class="pcoded-content bg-white">
    <div class="pcoded-inner-content">
        <div class="main-body mt-5">
            <div class="row">
                <div class="home-img">
                </div>
                <div class="home-text">
                    <h1>Trouvez ici vos immeubles de rêve au moindre coup !!!</h1>
                </div>
                <div class="home-sample">
                    <div class="sample-item"></div>
                    <div class="sample-item"></div>
                    <div class="sample-item"></div>
                </div>
            </div>
            <div class="row mt-5 m-t-page">
                <div class="col-sm-12 py-5 p-y-page">
                    <h2 class="text-center text-primary mt-5">
                        {{ __('Nos immobiliers populaires') }}
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($this->postPopulars as $post)
                <div class="col-sm-6 col-md-4 my-2">
                    <div class="card h-100">
                        <x-posts.post-card class="py-3 px-2" :post="$post"/>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row mt-4 m-t-page">
                <div class="col-sm-12 py-5 p-y-page">
                    <h2 class="text-center text-primary mt-5">
                        {{ __('Nos derniers immobiliers') }}
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($this->postLatests as $post)
                <div class="col-sm-6 col-md-4 my-2">
                    <div class="card h-100">
                        <x-posts.post-card class="py-3 px-2" :post="$post"/>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<section>
    <footer>
        <span>Copyright &copy; 2024 by Zaiomeny</span>
    </footer>
</section>
</div>
