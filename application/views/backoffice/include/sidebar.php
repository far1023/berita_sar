<aside class="main-sidebar sidebar-light-danger elevation-0">
    <a href="<?= site_url();?>" class="brand-link navbar-dark">
        <span class="brand-text font-weight-light"><b>SiNew</b></span>
    </a>

    <div class="sidebar">
        <nav class="mt-3 border rounded elevation-1" style="padding: 5px">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= site_url('beranda') ?>" class="nav-link active">
                        <i class="nav-icon fas big-icon fa-home icon-wrap"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('admin') ?>" class="nav-link">
                        <i class="nav-icon fas big-icon fa-lock icon-wrap"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('dosen') ?>" class="nav-link">
                        <i class="nav-icon fas big-icon fa-lock icon-wrap"></i>
                        <p>Dosen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('berita') ?>" class="nav-link">
                        <i class="nav-icon fas big-icon fa-lock icon-wrap"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas big-icon fa-database icon-wrap"></i>
                        <p>Lv1<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-fw">&nbsp</i><i class="fas fa-globe-asia sub-icon-mg nav-icon"></i>
                                <p>Lv2</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>