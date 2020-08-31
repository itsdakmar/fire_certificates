<!-- start sidebar -->
<div class="sidebar-panel">
    <div class="gull-brand pr-3 text-center mt-4 mb-2 d-flex justify-content-center align-items-center">
        <img class="pl-3" src="{{ asset('assets/images/logo.png') }}" alt="">
        <!-- <span class=" item-name text-20 text-primary font-weight-700">GULL</span> -->
        <div class="sidebar-compact-switch ml-auto"><span></span></div>

    </div>
    <!-- user -->
    <div class="scroll-nav" data-perfect-scrollbar data-suppress-scroll-x="true">

        <!-- user close -->
        <!-- side-nav start -->
        <div class="side-nav">

            <div class="main-menu">
                <ul class="metismenu" id="menu">
                    <li class="Ul_li--hover">
                        <a class=" " href="{{ route('dashboard') }}">
                            <i class="i-Home-Window text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Laman Utama</span>
                        </a>
                    </li>
                    <li class="Ul_li--hover">
                        <a class="has-arrow" href="#">
                            <i class="i-Building text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Premis</span>
                        </a>
                        <ul class="mm-collapse">
                            <li class="item-name">
                                <a href="{{ route('premise.index') }}">
                                    <i class="nav-icon i-Data"></i>
                                    <span class="item-name">Maklumat Premis</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="Ul_li--hover">
                        <a class="has-arrow" href="#">
                            <i class="i-Library text-20 mr-2 text-muted"></i>

                            <span class="item-name  text-muted">Fail</span>
                        </a>
                        <ul class="mm-collapse">
                            <li class="item-name">
                                <a href="{{ route('application.create') }}">
                                    <i class="nav-icon i-File"></i>
                                    <span class="item-name">Buka Fail</span>
                                </a>
                            </li>
                            <li class="item-name">
                            <li class="nav-item">
                                <a href="{{ route('application.index') }}">
                                    <i class="nav-icon i-File"></i>
                                    <span class="item-name">Senarai Fail</span>
                                </a>
                            </li>
                    </li>

                </ul>
                </li>
                <li class="Ul_li--hover">
                    <a class="has-arrow" href="#">
                        <i class="i-Suitcase text-20 mr-2 text-muted"></i>
                        <span class="item-name  text-muted">Pemeriksaan</span>
                    </a>
                    <ul class="mm-collapse">
                        <li class="item-name">
                            <a href="#">
                                <i class="nav-icon i-Crop-2"></i>
                                <span class="item-name">Senarai Pemeriksaan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="Ul_li--hover">
                    <a class="has-arrow" href="#">
                        <i class="i-Computer-Secure text-20 mr-2 text-muted"></i>
                        <span class="item-name  text-muted">Sijil Perakuan</span>
                    </a>
                    <ul class="mm-collapse">

                        <li class="item-name">
                            <a href="contact-list-table.html">
                                <i class="nav-icon i-Add-File"></i>
                                <span class="item-name">Penghasilan Baru</span>
                            </a>
                        </li>
                        <li class="item-name">
                            <a href="invoice.html">
                                <i class="nav-icon i-Add-File"></i>
                                <span class="item-name">Pindaan</span>
                            </a>
                        </li>
                        <li class="item-name">
                            <a href="inbox.html">
                                <i class="nav-icon i-Add-File"></i>
                                <span class="item-name">Gantian</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- <p class="main-menu-title text-muted ml-3 font-weight-700 text-13 mt-4 mb-2">UI Elements</p> -->

                <li class="Ul_li--hover">
                    <a class="has-arrow" href="#">
                        <i class="i-File-Clipboard-File--Text text-20 mr-2 text-muted"></i>
                        <span class="item-name  text-muted">Pendakwaan Kes</span>
                    </a>
                    <ul class="mm-collapse">

                        <li class="item-name">
                        <a class="has-arrow cursor-pointer">
                            <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Senarai Kes</span>

                        </a>
                        <ul class="mm-collapse">
                            <li class="item-name">
                                <a class="" href="#">Kertas Siasatan</a>
                            </li>
                            <li class="item-name">
                                <a class="" href="#">Pendakwaan</a>
                            </li>
                        </ul>
                        </li>
                    </ul>
                </li>
                <li class="Ul_li--hover">
                    <a class="" href="#">
                        <i class="i-Money1 mr-2 text-muted"></i>
                        <span class="item-name  text-muted">Bayaran</span>
                    </a>
                </li>
                    <li class="Ul_li--hover">
                        <a class="" href="#">
                            <i class="i-Bar-Chart mr-2 text-muted"></i>
                            <span class="item-name  text-muted">Laporan</span>
                        </a>
                    </li>
                <li class="Ul_li--hover">
                    <a class="has-arrow">
                        <i class="i-Administrator text-20 mr-2 text-muted"></i>
                        <span class="item-name  text-muted">Profil Diri</span>
                    </a>
                    <ul class="mm-collapse">
                        <li class="item-name">
                            <a href="signup.html">
                                <i class="nav-icon i-Add-User"></i>
                                <span class="item-name">Kemaskini Profil</span>
                            </a>
                        </li>
                        <li class="item-name">
                            <a href="forgot.html">
                                <i class="nav-icon i-Find-User"></i>
                                <span class="item-name">Daftar Keluar</span>
                            </a>
                        </li>

                    </ul>
                </li>

                </ul>
            </div>
        </div>
    </div>

    <!-- side-nav-close -->
</div>
<!-- end sidebar -->
<div class="switch-overlay"></div>
