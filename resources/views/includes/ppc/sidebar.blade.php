 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="{{  Route('dashboard-ppc') }}">
                <div class="sidebar-brand-text mx-3">PPC</div>
                <img src="{{ url('forntend\images\imageedit_4_9087602155.png') }}" class="rounded float-left" width="50px" height="50px" alt="...">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ set_active('dashboard-ppc') }}">
                <a class="nav-link" href="{{  Route('dashboard-ppc') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ set_active('perencanaan-ppc') }}">
                <a class="nav-link" href="{{Route ('perencanaan-ppc') }}">
                     <i class="fas fa-clipboard-list"></i>
                    <span>Perencanaan Produksi</span></a>
            </li>
             <li class="nav-item {{ set_active('data-waktu') }}">
                <a class="nav-link" href="{{Route ('data-waktu') }}">
                     <i class="fas fa-database"></i>
                    <span>Data waktu standar</span></a>
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