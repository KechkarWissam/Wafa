
<li class="nav-item 
            @if(key_exists('children',$item) && count($item['children'])) 
                @foreach ($item['children'] as $child )
                {{ Route::currentRouteName()===$child['link']?' menu-open':''}}
                @endforeach
            @endif">
            <a href="{{$item['link']?route($item['link']) :'#'}}" class="nav-link {{Route::currentRouteName()===$item['link'] ?'active':''}}
               @if(key_exists('children',$item) && count($item['children'])) 
                 @foreach ($item['children'] as $child )
                 {{ Route::currentRouteName()===$child['link']?'active':''}}
                 @endforeach
               @endif" >
              <i class="{{$item['icon']}}"></i>
              <p>
                {{__($item['name'])}}
                @if(key_exists('children',$item) && count($item['children']))
                <i class="right fas fa-angle-left"></i>
                @endif
              </p>
            </a>
            
            @if(key_exists('children',$item) && count($item['children']))                
              <ul class="nav nav-treeview">
                @foreach ($item['children'] as $child )
                  @include('admin.layouts.sidebars.nav-item',['item' => $child])
                @endforeach
              </ul>
            @endif
</li>