<div>
    @if ($activities->isNotEmpty())
        <x-trafikrak::tier.horizontal-scroll>
            <x-slot name="title">
                {{ __('Actividades relacionados') }}
            </x-slot>

            <ul class="grid grid-flow-col auto-cols-[40%] md:auto-cols-[30%] gap-6">
                @foreach ($activities as $activity)
                    <li>
                        @if ($activity instanceof \Trafikrak\Models\News\Event)
                            <x-trafikrak::events.mini :event="$activity"/>
                        @elseif ($activity instanceof \Trafikrak\Models\Education\CourseModule)
                            <x-trafikrak::course-modules.mini :module="$activity"/>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-trafikrak::tier.horizontal-scroll>
    @endif
</div>