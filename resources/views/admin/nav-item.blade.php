
<li class="nav-item ">
{{-- route($item['link']) --}}
            <a href="{{$item['link']}}" class="nav-link {{Route::currentRouteName()===$item['link']?'active':''}}">
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
                  @include('admin.nav-item',['item' => $child])
                @endforeach
              </ul>
            @endif
</li>