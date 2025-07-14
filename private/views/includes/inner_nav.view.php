<div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="index-2.html" class="menu-logo">
                                <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="has-submenu megamenu">
                                <a href="students"><?= Auth::getfirst_school() ?> <i class=""></i></a>
                            </li>
                            <li class="has-submenu megamenu">
                                <a href="students">DASHBOARD <i class=""></i></a>
                            </li>
                            <li class="has-submenu">
                                <a href="classes">CLASSES <i class=""></i></a>
                            </li>
                            <li class="has-submenu">
                                <a href="#">STAFF <i class=""></i></a>
                            </li>
                            <li class="has-submenu">
                                <a href="students">STUDENTS <i class=""></i></a>
                            </li>
                            <li class="has-submenu">
                                <a href="schools">SCHOOLS <i class=""></i></a>
                            </li>
                            <li class="has-submenu">
                                <a href="users">USERS <i class=""></i></a>
                            </li>
                            <li class="has-submenu active">
                                <a href="test">TEST <i class=""></i></a>
                            </li>
                        </ul>
                    </div>