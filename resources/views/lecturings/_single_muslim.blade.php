<div class="card">
    <table class="table-sm mb-0">
        <tbody>
            <tr>
                <td class="col-4">{!! config('lecturing.emoji.lecturing') !!} {{ __('lecturing.lecturing') }}</td>
                <td><strong>{{ $lecturing->day_name }}, {{ $lecturing->time_text }}</strong></td>
            </tr>
            <tr><td>{!! config('lecturing.emoji.date') !!} {{ __('time.date') }}</td><td>{{ $lecturing->full_date }}</td></tr>
            <tr><td>{!! config('lecturing.emoji.time') !!} {{ __('lecturing.time') }}</td><td>{{ $lecturing->time }}</td></tr>
            @if ($lecturing->place)
                <tr><td>&#128216; {{ __('lecturing.book') }}</td><td>{{ $lecturing->place }}</td></tr>
            @endif
            @if ($lecturing->title)
                <tr><td>{!! config('lecturing.emoji.title') !!} {{ __('lecturing.title') }}</td><td>{{ $lecturing->title }}</td></tr>
            @endif
            @if ($lecturing->title)
                <tr><td>{!! config('lecturing.emoji.lecturer') !!} {{ __('lecturing.lecturer_name') }}</td><td>{{ $lecturing->lecturer_name }}</td></tr>
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
