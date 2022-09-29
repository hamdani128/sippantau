<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo base_url() ?>/assets/images/siantar.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">SIPPANTAU</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="/home">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashbord</div>
            </a>
        </li>

        <?php if($userinfo['level'] !== 'perusahaan') : ?>
        <li class="menu-label">Modul Master</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
            <ul>
                <li> <a href="/pages/master_register"><i class="bx bx-right-arrow-alt"></i>Informasi
                        Registrasi</a>
                </li>
                <li>
                    <a href="/pages/informasi_user"><i class="bx bx-right-arrow-alt"></i>
                        Informasi Users
                    </a>
                </li>
                <li>
                    <a href="/pages/informasi_paramater"><i class="bx bx-right-arrow-alt"></i>
                        Informasi Paramater
                    </a>
                </li>
                <li>
                    <a href="/pages/informasi_metoda"><i class="bx bx-right-arrow-alt"></i>
                        Informasi Metoda
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if($userinfo['level'] == 'perusahaan') : ?>
        <li class="menu-label">Modul Limbah</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Validasi Limbah</div>
            </a>
            <ul>
                <li>
                    <a href="/pages/limbah_air_domestik">
                        <i class="bx bx-right-arrow-alt"></i>
                        Limbah Air Domestik
                    </a>
                </li>
                <li>
                    <a href="/pages/limbah_air_kegiatan"><i class="bx bx-right-arrow-alt"></i>
                        Limbah Air Kegiatan
                    </a>
                </li>
                <li>
                    <a href="/pages/limbah_emisi_udara"><i class="bx bx-right-arrow-alt"></i>
                        Limbah Emisi Udara
                    </a>
                </li>
                <li>
                    <a href="/pages/limbah_b3"><i class="bx bx-right-arrow-alt"></i>
                        Limbah B3
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if($userinfo['level'] !== 'perusahaan') : ?>
        <li class="menu-label">Modul Perusahaan</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Validasi Limbah</div>
            </a>
            <ul>
                <li>
                    <a href="/pages/limbah_air_domestik_admin">
                        <i class="bx bx-right-arrow-alt"></i>
                        Limbah Air Domestik
                    </a>
                </li>
                <li>
                    <a href="/pages/limbah_air_kegiatan_admin"><i class="bx bx-right-arrow-alt"></i>
                        Limbah Air Kegiatan
                    </a>
                </li>
                <li>
                    <a href="/pages/limbah_emisi_udara_admin"><i class="bx bx-right-arrow-alt"></i>
                        Limbah Emisi Udara
                    </a>
                </li>
                <li>
                    <a href="/pages/limbah_b3_admin"><i class="bx bx-right-arrow-alt"></i>
                        Limbah B3
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

    </ul>
    <!--end navigation-->
</div>