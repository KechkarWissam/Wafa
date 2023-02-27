
    <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>{{$header->name}}</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  @isset($breadcrumbs)
                          @foreach ($breadcrumbs as $item)
                              @if ($item['url']!= Request::url())
                                <li class="breadcrumb-item">
                                    <a class="breadcrumb-link" href="{{$item['url']}}">{{$item['name']}}</a>
                                </li>
                                @else
                                <li class="breadcrumb-item active" aria-current="page">{{$item['name']}}</li>
                              @endif  
                            @endforeach
                  @endisset
                </ol>
              </div>
            </div>
          </div>
    </div>