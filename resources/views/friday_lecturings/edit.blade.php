@extends('layouts.app')

@section('title', __('lecturing.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        @if (request('action') == 'delete' && $lecturing)
        @can('delete', $lecturing)
            <div class="card">
                <div class="card-header">{{ __('lecturing.delete_for_friday') }}</div>
                <div class="card-body">
                    <label class="control-label text-primary">{{ __('lecturing.title') }}</label>
                    <p>{{ $lecturing->title }}</p>
                    <label class="control-label text-primary">{{ __('lecturing.description') }}</label>
                    <p>{{ $lecturing->description }}</p>
                    {!! $errors->first('lecturing_id', '<span class="form-error small">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('lecturing.delete_confirm_for_friday') }}</div>
                <div class="card-footer">
                    {!! FormField::delete(
                        ['route' => ['lecturings.destroy', $lecturing]],
                        __('app.delete_confirm_button'),
                        ['class' => 'btn btn-danger'],
                        ['lecturing_id' => $lecturing->id]
                    ) !!}
                    {{ link_to_route('lecturings.edit', __('app.cancel'), [$lecturing], ['class' => 'btn btn-link']) }}
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">
                <span class="card-options">{{ $lecturing->audience }}</span>
                {{ __('lecturing.edit_for_friday') }}
            </div>
            {{ Form::model($lecturing, ['route' => ['friday_lecturings.update', $lecturing], 'method' => 'patch']) }}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {!! FormField::text('date', [
                            'required' => true,
                            'label' => __('lecturing.date'),
                            'class' => 'date-select',
                        ]) !!}
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6">{!! FormField::text('start_time', ['required' => true, 'label' => __('lecturing.start_time'), 'placeholder' => '12:15']) !!}</div>
                        </div>
                        {!! FormField::text('lecturer_name', ['required' => true, 'label' => __('lecturing.friday_lecturer_name')]) !!}
                        <div class="row">
                            <div class="col-12">{!! FormField::text('muadzin_name', ['required' => true, 'label' => __('lecturing.muadzin_name'),]) !!}</div>
                        </div>
                    </div>
                </div>
                {!! FormField::textarea('description', ['label' => __('lecturing.description')]) !!}
            </div>
            <div class="card-footer">
                {{ Form::submit(__('lecturing.update'), ['class' => 'btn btn-success']) }}
                {{ link_to_route('lecturings.show', __('app.cancel'), [$lecturing], ['class' => 'btn btn-link']) }}
                @can('delete', $lecturing)
                    {{ link_to_route('lecturings.edit', __('app.delete'), [$lecturing, 'action' => 'delete'], ['class' => 'btn btn-danger float-right', 'id' => 'del-lecturing-'.$lecturing->id]) }}
                @endcan
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endif
@endsection

@section('styles')
    {{ Html::style(url('css/plugins/jquery.datetimepicker.css')) }}
@endsection

@push('scripts')
    {{ Html::script(url('js/plugins/jquery.datetimepicker.js')) }}
<script>
(function () {
    $('.date-select').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        closeOnDateSelect: true,
        scrollInput: false,
        dayOfWeekStart: 1,
        inline: true,
    });
})();
</script>
@endpush

@section('styles')
    {{ Html::style(url('css/plugins/jquery.datetimepicker.css')) }}
@endsection

@push('scripts')
    {{ Html::script(url('js/plugins/jquery.datetimepicker.js')) }}
<script>
(function () {
    $('.date-select').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        closeOnDateSelect: true,
        scrollInput: false,
        dayOfWeekStart: 1,
        inline: true,
        scrollMonth: false,
    });
})();
</script>
@endpush
