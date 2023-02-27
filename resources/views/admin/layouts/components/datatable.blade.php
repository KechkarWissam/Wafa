 <div class="card">
    {{-- <div class="card-header">
      <h3 class="card-title"></h3>
    </div> --}}
    <!-- /.card-header -->
    <div class="card-body">
    <table id="{{ $id }}" width="100%" class="table table-bordered table-striped">
        <thead>
        <tr>
        @foreach($heads as $th)
                <th>
                    {{ is_array($th) ? ($th['label'] ?? '') : $th }}
                </th>
        @endforeach
        </tr>
        </thead>
        {{-- <tbody>{{ $slot }}</tbody> --}}
        <tbody></tbody>
        @isset($withFooter)
            <tfoot>
            <tr>
                @foreach($heads as $th)
                    <th>{{ is_array($th) ? ($th['label'] ?? '') : $th }}</th>
                @endforeach
            </tr>
            </tfoot>
        @endisset
    </table>
    </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@push('js')
    <script>
     $(document).ready(function() {
            const myId = '#{!! $id !!}';
            let myConfig = @json($config);
           // console.log(myConfig);
            var table=$(myId).DataTable({
            "responsive": true,
            "lengthChange": false, 
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            },
            "ajax": {
                url:  myConfig.ajax,
            },
            "columns": myConfig.columns,
            "order" : myConfig.order
            })
            .buttons().container().appendTo(myId+'_wrapper .col-md-6:eq(0)');
            
      })
    </script>  
@endpush