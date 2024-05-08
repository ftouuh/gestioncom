<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                {{-- <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle"> --}}
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">M. {{ Auth::user()->prenom}}</h4>
                <span class="text-muted">Admin                                                                                                                      </span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">{{ __('Menu') }}</li>

                <li>
                    <a href="/" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">+</span>
                        <span>{{ __('Interface') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>{{ __('Management') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('show.products')}}">Produits</a></li>
                        <li><a href="{{route('show.clients')}}">Clients</a></li>
                        <li><a href="{{route('show.factures')}}">Factures</a></li>
                        <li><a href="{{route('show.devis')}}">Devis</a></li>
                        <li><a href="{{route('show.users')}}">Utilisateurs</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
