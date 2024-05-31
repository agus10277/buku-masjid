<div class="card">
    <table class="table-sm mb-0">
        <tbody>
            <tr>
                <td class="col-4">{!! config('lecturing.emoji.date') !!} {{ __('time.day_name') }}/{{ __('time.date') }}</td>
                <td><strong>{{ $lecturing->day_name }}</strong>, {{ $lecturing->full_date }}</td>
            </tr>
            <tr><td>{!! config('lecturing.emoji.time') !!} {{ __('lecturing.time') }}</td><td>{{ $lecturing->start_time }}</td></tr>
            <tr><td>{!! config('lecturing.emoji.lecturer') !!} {{ __('lecturing.friday_lecturer_name') }}</td><td>{{ $lecturing->lecturer_name }}</td></tr>
            @if ($lecturing->muadzin_name)
                <tr><td>{!! config('lecturing.emoji.muadzin') !!} {{ __('lecturing.muadzin_name') }}</td><td>{{ $lecturing->muadzin_name }}</td></tr>
            @endif
            @if ($lecturing->title)
                <tr><td>{!! config('lecturing.emoji.title') !!} {{ __('lecturing.title') }}</td><td>{{ $lecturing->title }}</td></tr>
            @endif
            @if ($lecturing->description)
                <tr><td>{!! config('lecturing.emoji.description') !!} {{ __('lecturing.description') }}</td><td>{{ $lecturing->description }}</td></tr>
            @endif
        </tbody>
        <tfoot class="table">
            <tr>
                <td colspan="2" class="text-center">
                    @can('view', $lecturing)
                        {{ link_to_route(
                            'lecturings.show',
                            __('app.show'),
                            [$lecturing],
                            ['id' => 'show-lecturing-' . $lecturing->id]
                        ) }}
                    @endcan
                </td>
            </tr>
        </tfoot>
    </table>
</div>
