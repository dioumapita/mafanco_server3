<!-- start header -->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo">
            <a href="#">
                <span class="logo-icon material-icons fa-rotate-45">school</span>
                <span class="logo-default">TPI DIXINN</span> </a>
        </div>
        <!-- logo end -->
        <ul class="nav navbar-nav navbar-left in">
            <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
        </ul>
        {{-- <form class="search-form-opened" action="#" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." name="query">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form> --}}

        <!-- start mobile menu -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
            data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- end mobile menu -->
        <!-- start header menu -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!--start annee scolaire -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">
                        Année:
                        <span class="username username-hide-on-mobile"> 2024 </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="#">
                                <a href="{{ route('annee_active',1) }}">2023</a>
                                <a href="{{ route('annee_active',2) }}">2024</a>
                            </a>
                        </li>
                        {{-- @foreach ($all_annees as $annee)
                            <li>
                                @if ($annee->annee == $annee_courante->annee)
                                <a href="#">
                                    <i class="icon-check"></i>
                                    {{ $annee->annee }}
                                </a>
                                @else
                                <a href="{{ route('annee_active',$annee) }}">
                                    <i class="icon-calendar"></i>
                                    {{ $annee->annee }}
                                </a>
                                @endif
                            </li>
                        @endforeach --}}
                    </ul>
                </li>
                <li>
                    <form class="mt-2" method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <button type="submit" class="btn btn-primary">Se deconnecter <i class="fa fa-sign-out" aria-hidden="true"></i></button>
                        &emsp;
                    </form>
                </li>
                <!-- end manage user dropdown -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                        data-upgraded=",MaterialButton">
                        <i class="material-icons">more_vert</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end header -->
