
<div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
        <ul class="list-unstyled navbar__list">
            <?php 
                $dt = $data;
                unset($dt['uri']);
            ?>
            @foreach($dt as $k=>$d)
                <?php
                    $n = $k+1;
                    $check_file_path  = 'show/'.$d.'/'.$n;
                    $fs = 'order_new_font_12';
                ?>
                @if($check_file_path == $data['uri'])
                    <li class="{{ request()->is($data['uri']) ? 'file_list' : '' }} has-sub">
                        <div id="header_div" class="row form-group">
                            <span id="space_col"></span>
                            <span>
                                <h6 id="heading_name">Document #{{$k+1}}</h6>
                                <a id="header_name" class="js-arrow" href="{{route('show_file', ['file'=>$d, 'num'=>$k+1])}}">Me, Dustin</a>
                            </span> 
                        </div>
                    </li>
                @elseif($d == $data['uri'])
                    <li class="has-sub file_list">
                        <div id="header_div" class="row form-group">
                            <span id="space_col"></span>
                            <span>
                                <h6 id="heading_name">Document #{{$k+1}}</h6>
                                <a id="header_name" class="js-arrow" href="{{route('show_file', ['file'=>$d, 'num'=>$k+1])}}">Me, Dustin</a>
                            </span> 
                        </div>
                        
                    </li>
                @else
                    <li class="has-sub">
                        <div class="row form-group">
                            <span>
                                <h6 id="heading_name">Document #{{$k+1}}</h6>
                                <a id="header_name" class="js-arrow" href="{{route('show_file', ['file'=>$d, 'num'=>$k+1])}}">Me, Dustin</a>
                            </span> 
                        </div>
                        
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>
