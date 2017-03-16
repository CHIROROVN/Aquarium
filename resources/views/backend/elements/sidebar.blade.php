       <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="javascript::void(0);">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="{{ asset('') }}public/backend/img/user.png" height="60" width="60" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> {{@Auth::user()->first_name}}</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                        </li>
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                <li class="panel">
                    <a href="{{route('backend.dashboard.index')}}" ><i class="icon-table"></i> Dashboard </a>
                </li>

                <!-- Category -->
                <li class="panel ">
                    <a href="javascript::void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-category">
                        <i class="icon-book"> </i> Category <span class="pull-right">
                          <i class="icon-angle-left"></i></span> &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav-category">
                        <li class=""><a href="{{route('backend.categories.index')}}"><i class="icon-angle-right"></i> List </a></li>
                        <li class=""><a href="{{route('backend.categories.add')}}"><i class="icon-angle-right"></i> Add </a></li>
                    </ul>
                </li>
                <!-- /Category -->

                <!-- Product -->
                <li class="panel ">
                    <a href="javascript::void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-product">
                        <i class="icon-weibo"> </i> Product <span class="pull-right">
                          <i class="icon-angle-left"></i></span> &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav-product">
                        <li class=""><a href="{{route('backend.products.index')}}"><i class="icon-angle-right"></i> List </a></li>
                        <li class=""><a href="{{route('backend.products.add')}}"><i class="icon-angle-right"></i> Add </a></li>
                    </ul>
                </li>
                <!-- /Product -->

                <!-- Menu -->
                <li class="panel ">
                    <a href="javascript::void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-menu">
                        <i class="icon-tasks"> </i> Menu <span class="pull-right">
                          <i class="icon-angle-left"></i></span> &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav-menu">
                        <li class=""><a href=""><i class="icon-angle-right"></i> List </a></li>
                        <li class=""><a href=""><i class="icon-angle-right"></i> Add </a></li>
                    </ul>
                </li>
                <!-- /Menu -->

                <!-- Contact -->
                <li class="panel ">
                    <a href="javascript::void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-contact">
                        <i class="icon-envelope"> </i> Contact <span class="pull-right"> 
                          <i class="icon-angle-left"></i></span> &nbsp; <span class="label label-default"></span>
                          &nbsp; <span class="label label-success">{{cContact()}}</span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav-contact">
                        <li class=""><a href="{{route('backend.contacts.index')}}"><i class="icon-angle-right"></i> List </a></li>
                    </ul>
                </li>
                <!-- /Contact -->

                <!-- Chat Rooms -->
                <li class="panel ">
                    <a href="javascript::void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-chat">
                        <i class="icon-comments"> </i> Chat Rooms <span class="pull-right">
                          <i class="icon-angle-left"></i></span> &nbsp; <span class="label label-default"></span>&nbsp;
                          &nbsp; <span class="label label-danger">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav-chat">
                        <li class=""><a href="{{route('backend.chats.index')}}"><i class="icon-angle-right"></i> List </a></li>
                    </ul>
                </li>
                <!-- /Chat -->

                <!-- System -->
                <li class="panel ">
                    <a href="javascript::void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-system">
                        <i class="icon-cog"> </i> System <span class="pull-right">
                          <i class="icon-angle-left"></i></span> &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav-system">
                        <li class=""><a href=""><i class="icon-angle-right"></i> Logo </a></li>
                        <li class=""><a href=""><i class="icon-angle-right"></i> Meta </a></li>
                        <li class=""><a href=""><i class="icon-angle-right"></i> Footer </a></li>
                        <li class=""><a href=""><i class="icon-angle-right"></i> Banner </a></li>
                        <li class=""><a href=""><i class="icon-angle-right"></i> Google Map </a></li>
                        <li class=""><a href="{{route('backend.systems.signature')}}"><i class="icon-angle-right"></i> Mail </a></li>
                    </ul>
                </li>
                <!-- /System -->

                <!-- User -->
                <li class="panel ">
                    <a href="javascript::void(0);" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-user">
                        <i class="icon-user"> </i> Users <span class="pull-right">
                          <i class="icon-angle-left"></i></span> &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav-user">
                        <li class=""><a href="{{route('backend.users.change_pass')}}"><i class="icon-angle-right"></i> Change Password </a></li>
                        <li class=""><a href="{{route('backend.users.list')}}"><i class="icon-angle-right"></i> List </a></li>
                        <li class=""><a href="{{route('backend.users.add')}}"><i class="icon-angle-right"></i> Add </a></li>
                    </ul>
                </li>
                <!-- /User -->
                <li><a href="{{route('backend.users.logout')}}"><i class="icon-signout"></i> Logout </a></li>
            </ul>

        </div>