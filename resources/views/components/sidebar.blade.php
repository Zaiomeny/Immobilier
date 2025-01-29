<nav class="pcoded-navbar" navbar-theme="themelight1" active-item-theme="theme4" sub-item-theme="theme2" active-item-style="style0" pcoded-navbar-position="fixed">
    <div class="sidebar_toggle">
        <a href="#"><i class="icon-close icons"></i></a>
    </div>
    <div class="pcoded-inner-navbar main-menu" id="">
        <br>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme1">Espace utilisateur</div>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li @class(['active'=> request()->routeIs('dashboard')])>
                <a wire:navigate href="{{ route('dashboard') }}">
                    <span class="pcoded-micon"><i class="icofont icofont-dashboard-web"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">{{__('Tableau de bord')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        
            <li class="pcoded-hasmenu pcoded-trigger" dropdown-icon="style1" subitem-icon="style6">
                <a>
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Administrer</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li @class(['active'=> request()->routeIs('posts.index')])>
                        <a wire:navigate href="{{ route('posts.index') }}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">{{__('Mes posts')}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li @class(['active'=> request()->routeIs('categories.index')])>
                        <a wire:navigate href="{{ route('categories.index') }}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">{{ __('Categories')}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms" menu-title-theme="theme1">Espace Client/Vendeur</div>
        <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
            <li>
                <a wire:navigate href="{{route('actualites')}}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>A</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">{{__('Actualités')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{route('user.followed')}}">
                    <span class="pcoded-micon"><i class="icofont-users-social"></i><b>M/S</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">{{__('Mes suivi(e)s')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>