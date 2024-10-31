        <!-- Page Wrapper Start -->
        <div class="page-wrapper">

            <!--  Header Start -->
            <header class="topbar">
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Header -->
                <!-- ---------------------------------- -->
                <div class="with-vertical">
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">

                            <!-- Start Hamburger Menu -->
                            <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                    <iconify-icon icon="tabler:menu-2"></iconify-icon>
                                </a>
                            </li>
                            <!-- End Hamburger Menu -->
                            
                            <!-- Start Searching -->
                            <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-lg-flex">
                                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#searchingModal">
                                    <iconify-icon icon="tabler:search"></iconify-icon>
                                </a>
                            </li>
                            <!-- End Searching -->

                        </ul>
                        
                        <!-- Start Logo width <= 992px -->
                        <div class="d-block d-lg-none py-3">
                            <a href="#" class="text-nowrap logo-img">
                                <h3 class="mb-0">
                                    <iconify-icon icon="tdesign:system-code" class="align-middle ms-1 me-1"></iconify-icon> <span class="align-middle">APP</span>
                                </h3>
                            </a>
                        </div>
                        <!-- End Logo width <= 992px -->
                        
                        <!-- Start Meatballs Menu width <= 992px -->
                        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <iconify-icon icon="tabler:dots" class="fs-7"></iconify-icon>
                        </a>
                        <!-- End Meatballs Menu width <= 992px -->
                        
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">

                                <!-- Start Searching -->
                                <li class="nav-item nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none">
                                    <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#searchingModal">
                                        <iconify-icon icon="tabler:search" class="fs-7 align-middle"></iconify-icon>
                                    </a>
                                </li>
                                <!-- End Searching -->
                                
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                                    <!-- Start Theme Mode -->
                                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                            <iconify-icon icon="tabler:moon"></iconify-icon>
                                        </a>
                                        <a class="nav-link sun light-layout" href="javascript:void(0)">
                                            <iconify-icon icon="tabler:sun"></iconify-icon>
                                        </a>
                                    </li>
                                    <!-- End Theme Mode -->

                                    <!-- start profile Dropdown -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="./assets/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="./assets/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3">
                                                            <?php echo $_SESSION['username']; ?>
                                                        </h5>
                                                        <p class="mb-0 d-flex align-items-center gap-2 text-break">
                                                            <iconify-icon icon="tabler:mail" class="fs-4"></iconify-icon>
                                                            <?php echo $_SESSION['email']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="#" class="py-8 px-7 mt-8 d-flex align-items-center">
                                                        <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                            <img src="./assets/images/svgs/icon-account.svg" alt="img" width="24" height="24" />
                                                        </span>
                                                        <div class="w-100 ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                            <span class="fs-2 d-block text-body-secondary">User Profile</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="py-8 px-7 mt-8 d-flex align-items-center">
                                                        <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                            <img src="./assets/images/svgs/icon-mingcute--settings-3-fill.svg" alt="img" width="24" height="24" />
                                                        </span>
                                                        <div class="w-100 ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Setting</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <a href="#" class="btn btn-outline-primary">Log Out</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- end profile Dropdown -->
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
                <!-- ---------------------------------- -->
                <!-- End Vertical Layout Header -->
                <!-- ---------------------------------- -->
            </header>
            <!--  Header End -->