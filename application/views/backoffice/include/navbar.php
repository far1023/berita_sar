<nav class="main-header navbar navbar-expand fixed-top navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <img src="<?= base_url() ?>" alt="">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="far fa-user fa-fw"></i>&nbsp <?= $this->magic->id_email($this->session->userdata('id')); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item nav-drop" href="<?php echo site_url('profil/index/'.$this->session->userdata('id')) ?>">Profil</a> 
                <a class="dropdown-item nav-drop" href="<?php echo site_url('profil/changePassword/'.$this->session->userdata('id')) ?>">Ubah Password</a> 
                <a class="dropdown-item nav-drop" href="<?php echo site_url() ?>auth/logout" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<br><br>