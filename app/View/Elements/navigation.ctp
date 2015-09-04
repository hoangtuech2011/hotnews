 <!-- header logo: style can be found in header.less -->
        <header class="main-header">
            <a href="/campaigns/home" class="logo">
<!--                 <img alt=""  width="100px" height="38px"> -->
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->Session->read('Auth.User.username');?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="/app/webroot/img/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->Session->read('Auth.User.username')." - ".$this->Session->read('Auth.User.Role.name')." ".$this->Session->read('Auth.User.Department.name');?>
                                        <small>Member since <?php echo date('F Y',strtotime($this->Session->read('Auth.User.created')))?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/users/view/<?php echo $this->Session->read('Auth.User.id')?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/users/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
