@extends('layouts.app')

@section('title', __('lecturing.detail_for_friday'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <span class="card-options">{{ $lecturing->audience }}</span>
                {{ __('lecturing.detail_for_friday') }}
            </div>
            <table class="table card-table table-sm">
                <tbody>
                    <tr>
                        <td>{!! config('lecturing.emoji.date') !!} {{ __('time.day_name') }}/{{ __('time.date') }}</td>
                        <td>{{ $lecturing->day_name }}, {{ $lecturing->full_date }}</td>
                    </tr>
                    <tr><td>{!! config('lecturing.emoji.time') !!} {{ __('lecturing.time') }}</td><td>{{ $lecturing->start_time }}</td></tr>
                    <tr><td>{!! config('lecturing.emoji.lecturer') !!} {{ __('lecturing.friday_lecturer_name') }}</td><td>{{ $lecturing->lecturer_name }}</td></tr>
                    <tr><td>{!! config('lecturing.emoji.muadzin') !!} {{ __('lecturing.muadzin_name') }}</td><td>{{ $lecturing->muadzin_name }}</td></tr>
                </tbody>
            </table>
            <div class="card-footer">
                @can('update', $lecturing)
                    {{ link_to_route('friday_lecturings.edit', __('lecturing.edit_for_friday'), [$lecturing], ['class' => 'btn btn-warning', 'id' => 'edit-lecturing-'.$lecturing->id]) }}
                @endcan
                {{ link_to_route('lecturings.index', __('lecturing.back_to_index'), [], ['class' => 'btn btn-link']) }}
            </div>
        </div>
    </div>
</div>
@endsection
