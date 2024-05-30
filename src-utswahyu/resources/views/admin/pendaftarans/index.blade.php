@extends('layouts.admin')
@section('content')
@can('pendaftaran_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pendaftarans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pendaftaran.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pendaftaran.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Booking">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.fullname') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.tanggal_lahir') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.tempat_lahir') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.NIK') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.nilai') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.transkrip_nilai') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftaran as $key => $daftar)
                        <tr data-entry-id="{{ $daftar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $daftar->id ?? '' }}
                            </td>
                            <td>
                                {{ $daftar->fullname ?? '' }}
                            </td>
                            <td>
                                {{ $daftar->address ?? '' }}
                            </td>
                            <td>
                                {{ $daftar->phone ?? '' }}
                            </td>
                            <td>
                                {{ $daftar->email ?? '' }}
                            </td>
                            <td>
                                {{ $daftar->tanggal_lahir ?? '' }}
                            </td>
                            <td>
                                {{ $daftar->tempat_lahir ?? '' }}
                            </td>
                            <td>
                                {{ $daftar->NIK ?? '' }}
                            </td>
                            <td>
                                {{ $daftar->nilai ?? '' }}
                            </td>
                            <td>
                                @if($daftar->transkrip_nilai)
                                    <a href="{{ asset('storage/' . $daftar->transkrip_nilai) }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('pendaftaran_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pendaftarans.show', $daftar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pendaftaran_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pendaftarans.edit', $daftar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pendaftaran_delete')
                                    <form action="{{ route('admin.pendaftarans.destroy', $daftar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('pendaftaran_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pendaftarans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Booking:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection