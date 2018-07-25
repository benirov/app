<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Session::get('nameUser') }}</p>
                    <!-- Status -->
                </div>
            </div>
        

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form hidden">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- construccion de menu -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header hidden">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
            @if($menu)
            @php
                $CursorMenu = [];
            @endphp
                @foreach($menu as $infoMenuParent)
                @php echo $infoMenuParent->id; @endphp 
                    @php $idParent = $infoMenuParent->id; @endphp
                         @if($infoMenuParent->parent == 0)
                            @php
                                $menuParent = '';
                                
                                $menuParent = "<li><a href='#'><i class='fa fa-link'></i> <span>$infoMenuParent->name
                                </span></a></li>";
                                
                            @endphp
                        @endif

                            @foreach($menu as $infoMenuChildrem)
                                @if(!in_array($idParent, $CursorMenu))
                                    @if($infoMenuChildrem->parent != 0)
                                        @if($idParent ==  $infoMenuChildrem->parent)
                                            @php
                                                $menuParent .= "<li><a href='#'>pruebas</a></li>";
                                            @endphp
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @php
                        array_push($CursorMenu, $idParent);
                        @endphp


                            @php
                                echo $menuParent;
                            @endphp

                @endforeach
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
