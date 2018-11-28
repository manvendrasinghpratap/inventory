<a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP--><!--BEGIN TOPBAR-->
<div id="header-topbar-option-demo" class="page-header-topbar">
    <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
        <div class="navbar-header"><button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a id="logo" href="{{url('/dashboard')}}" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">{{ Config::get('app.projectname')}}</span><span style="display: none" class="logo-text-icon">E</span></a></div>
        <div class="topbar-main">
            <a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
            
            <form id="topbar-search" action="#" method="GET" class="hidden-xs">
                <div class="input-group"><input type="text" placeholder="Search..." class="form-control"/><span class="input-group-btn"><a href="javascript:;" class="btn submit"><i class="fa fa-search"></i></a></span></div>
            </form>
            <ul class="nav navbar navbar-top-links navbar-right mbn">                
                <li class="dropdown topbar-user">
                    <a data-hover="dropdown" href="#" class="dropdown-toggle">
					{{ Html::image('public/images/people/1.jpg', 'Profile Pic',array('class' => 'img-responsive img-circle')) }}
					&nbsp;<span class="hidden-xs">{{ Auth::user()->name }}</span>&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-user pull-right">
                        <li><a href="extra-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-key"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
            </ul>
        </div>
    </nav>
    <!--BEGIN MODAL CONFIG PORTLET-->
    <div id="modal-config" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et nisl eget porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie. Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis magna et aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor vitae quam dictum condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec aliquam nisi, a mollis neque. Ut vel felis quis tellus hendrerit placerat. Vivamus vel nisl non magna feugiat dignissim sed ut nibh. Nulla elementum, est a pretium hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget massa. Sed ut ultricies felis.</p>
                </div>
                <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-default">Close</button><button type="button" class="btn btn-primary">Save changes</button></div>
            </div>
        </div>
    </div>
    <!--END MODAL CONFIG PORTLET-->
</div>