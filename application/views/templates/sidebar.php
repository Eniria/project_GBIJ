        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #173014;">

            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden os-scrollbar-unusable">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-10">
                    <img src="<?= base_url('/assets/img/logogereja.png') ?>" class="img-circle elevation-2" width="50" height="50">
                    </fa-solid> <!-- letak mengubah icon logo pada dashboard -->
                </div>
                <div class="sidebar-brand-text mx-3" style="color: #9A8D8D;">GBIJ </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Admin
            </div> -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-house-user"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                User
            </div> -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/edit'); ?>">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Edit Profile</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/changepassword'); ?>">
                <i class="fas fa-fw fa-arrow-right"></i>
                    <span>Ubah Password</span></a>
            </li>


            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('jemaat'); ?>">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Jemaat</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Baptis'); ?>">
                    <i class="fas fa-fw fa-hand-holding-medical"></i>
                    <span>Baptis</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Pendeta') ?>">
                    <i class="fas fa-fw fa-bible"></i>
                    <span>Pendeta</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Nikah') ?>">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>Pernikahan</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Cerai') ?>">
                    <i class="fas fa-fw fa-bible"></i>
                    <span>Cerai</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('PengurusGereja') ?>">
                    <i class="fas fa-fw fa-files"></i>
                    <span>Pengurus Gereja</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Pindahjemaat') ?>">
                    <i class="fas fa-fw fa-angles-right"></i>
                    <span>Pindah Jemaat</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->