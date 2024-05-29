@extends('layouts.admin')
@section('content')
@can('beasiswa_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.beasiswas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.beasiswa.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.beasiswa.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Profile">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.beasiswa.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.beasiswa.fields.name_beasiswa') }}
                        </th>
                        <th>
                            {{ trans('cruds.beasiswa.fields.pembuat') }}
                        </th>
                        <th>
                            {{ trans('cruds.beasiswa.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.beasiswa.fields.start_beasiswa') }}
                        </th>
                        <th>
                            {{ trans('cruds.beasiswa.fields.finish_beasiswa') }}
                        </th>
                        <th>
                            {{ trans('cruds.beasiswa.fields.image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beasiswa as $key => $bsw)
                        <tr data-entry-id="{{ $bsw->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bsw->id ?? '' }}
                            </td>
                            <td>
                                {{ $bsw->name_beasiswa ?? '' }}
                            </td>
                            <td>
                                {{ $bsw->pembuat ?? '' }}
                            </td>
                            <td>
                                {{ $bsw->description ?? '' }}
                            </td>
                            <td>
                                {{ $bsw->start_beasiswa ?? '' }}
                            </td>
                            <td>
                                {{ $bsw->finish_beasiswa ?? '' }}
                            </td>
                            <td>
                                @if($bsw->image)
                                    <a href="{{ $bsw->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $bsw->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('beasiswa_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.beasiswas.show', $bsw->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('beasiswa_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.beasiswas.edit', $bsw->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('beasiswa_delete')
                                    <form action="{{ route('admin.beasiswas.destroy', $bsw->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('beasiswa_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.beasiswas.massDestroy') }}",
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
  let table = $('.datatable-Profile:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection