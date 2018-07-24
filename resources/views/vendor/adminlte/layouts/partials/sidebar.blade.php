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
                    $menuArrayChildrem = [];
                @endphp
                @foreach($menu as $infoMenu)
                        @if($infoMenu->parent != 0)
                            @php 
                                array_push($menuArrayChildrem, $infoMenu);
                            @endphp
                        @endif
                @endforeach


                 @php $AllMenu = ''; @endphp
                @foreach($menuArrayChildrem as $Menu)
                    @php $idParent = $Menu->parent; @endphp
                    @foreach($menu as $Menuparent)
                        @php
                            if(${"MenuParent" . $loop->index} != '')
                            {

                            }
                            else
                            {
                                ${"MenuParent" . $loop->index} = "<li><a href='#'><i class='fa fa-link'></i> <span>$Menuparent->name
                                </span></a></li>";

                                if($Menuparent->id ==  $idParent)
                                {
                                    ${"MenuParent" . $loop->index} .= "<ul class='treeview-menu'>
                                        <li><a href='#'>pruebas</a></li>
                                    </ul>";
                                };

                                $AllMenu .= ${"MenuParent" . $loop->index};
                            }
                            
                                
                        @endphp

                    @endforeach

                        
                @endforeach
                <!-- bsucar los hijos e imprimirlos -->
                @php $AllMenu; @endphp
                
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
