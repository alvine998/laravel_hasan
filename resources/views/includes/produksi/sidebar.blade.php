 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="{{  Route('dashboard-produksi') }}">
                <div class="sidebar-brand-text mx-3">Produksi</div>
                <img src="{{ url('forntend\images\imageedit_4_9087602155.png') }}" class="rounded float-left" width="50px" height="50px" alt="...">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ set_active('dashboard-produksi') }}">
                <a class="nav-link" href="{{  Route('dashboard-produksi') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
        
            </li>
             <li class="nav-item {{ set_active('laporan-harian') }}">
                <a class="nav-link" href="{{Route ('laporan-harian') }}">
                     <i class="fas fa-clipboard-list"></i>
                    <span>Laporan Harian Produksi</span></a>
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