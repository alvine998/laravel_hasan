 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="{{  Route('dashboard') }}">
                <div class="sidebar-brand-text mx-3">ADMIN</div>
                <img src="{{ url('forntend\images\imageedit_4_9087602155.png') }}" class="rounded float-left" width="50px" height="50px" alt="...">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ set_active('dashboard') }}">
                <a class="nav-link" href="{{  Route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i> 
                    <span>Dashboard</span></a>
            </li>

            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-list"></i>
                    <span>MASTER DATA</span>
                </a>
                <div id="collapseTwo" class="collapse {{ set_active(['pengguna','mesin','komponen','kustomer']) }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ set_active('pengguna') }}" href="{{Route ('pengguna') }}">Data Pengguna</a>
                        <a class="collapse-item {{ set_active('mesin') }}" href="{{Route ('mesin') }}">Data Mesin</a>
                        <a class="collapse-item {{ set_active('komponen') }}" href="{{Route ('komponen') }}">Data Komponen</a>
                        <a class="collapse-item {{ set_active('kustomer') }}" href="{{Route ('kustomer') }}">Data Kustomer</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                 <p class="text-center mb-2"><i class="fas fa-phone-square"></i> <strong>For help?</strong></p>
                 <p class="text-center mb-2">+62 089821810</p>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          
        </ul>
        <!-- End of Sidebar -->