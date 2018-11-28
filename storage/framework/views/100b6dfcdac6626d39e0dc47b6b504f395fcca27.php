<nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <li class="user-panel">
                <div class="thumb">
				<?php echo e(Html::image('public/images/people/1.jpg', 'Profile Pic',array('class' => 'img-circle'))); ?></div>
                <div class="info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <ul class="list-inline list-unstyled">
                        <li><a href="extra-profile.html" data-hover="tooltip" title="Profile"><i class="fa fa-user"></i></a></li>
                        <li><a href="email-inbox.html" data-hover="tooltip" title="Mail"><i class="fa fa-envelope"></i></a></li>
                        <li><a href="#" data-hover="tooltip" title="Setting" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a></li>
                       <li>
                            <a data-hover="tooltip" title="Logout" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>  </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </li>
            <li class=" <?php if((Request::segment(1)=='dashboard')): ?> active !!}<?php endif; ?>" >
                <a href="<?php echo e(url('/dashboard')); ?>">
                    <i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class=" <?php if((Request::segment(1)=='banks') || (Request::segment(1)=='addbank') || (Request::segment(1)=='editbank') || (Request::segment(1)=='categories') || (Request::segment(1)=='addCategory')||(Request::segment(1)=='editCategory') ||(Request::segment(1)=='products') ||(Request::segment(1)=='addProduct') ||(Request::segment(1)=='editProduct')): ?> active !!}<?php endif; ?>">
                <a href="#">
                    <i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i>
                    <span class="menu-title">Master</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('/banks')); ?>"><i class="fa fa-rocket"></i><span class="submenu-title">Banks</span></a></li> 
                    <li><a href="<?php echo e(url('/categories')); ?>"><i class="fa fa-rocket"></i><span class="submenu-title">Category</span></a></li>
                    <li><a href="<?php echo e(url('/products')); ?>"><i class="fa fa-rocket"></i><span class="submenu-title">Product</span></a></li>                   
                </ul>
            </li>
            <li class=" <?php if((Request::segment(1)=='createInvoice') || (Request::segment(1)=='invoices')): ?> active !!}<?php endif; ?>">
                <a href="#">
                    <i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i>
                    <span class="menu-title">Invoice</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('/generateInvoice')); ?>"><i class="fa fa-rocket"></i><span class="submenu-title">Create Invoice</span></a></li>                   
                </ul>
            </li>
        </ul>
    </div>
</nav>