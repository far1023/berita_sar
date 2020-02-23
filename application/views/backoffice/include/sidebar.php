<aside class="main-sidebar sidebar-light-danger elevation-0">
    <a href="<?= site_url();?>" class="brand-link navbar-dark">
        <span class="brand-text font-weight-light text-white"><b>Berita-SAR</b></span>
    </a>

    <div class="sidebar">
        <nav class="mt-3 border rounded elevation-1" style="padding: 5px">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= site_url('beranda') ?>" class="nav-link <?php if($this->uri->segment(1)=='beranda'){echo 'active';} ?>">
                        <i class="nav-icon fas big-icon fa-home icon-wrap"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('admin') ?>" class="nav-link <?php if($this->uri->segment(1)=='admin'){echo 'active';} ?>">
                        <i class="nav-icon fas big-icon fa-user-lock icon-wrap"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('dosen') ?>" class="nav-link <?php if($this->uri->segment(1)=='dosen'){echo 'active';} ?>">
                        <i class="nav-icon fas big-icon fa-users icon-wrap"></i>
                        <p>Dosen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('berita') ?>" class="nav-link <?php if($this->uri->segment(1)=='berita'){echo 'active';} ?>">
                        <i class="nav-icon fas big-icon fa-file icon-wrap"></i>
                        <p>Berita</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>