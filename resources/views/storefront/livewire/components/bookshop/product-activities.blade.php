<div>
    @if ($activities->isNotEmpty())
        <x-testa::tier.horizontal-scroll>
            <x-slot name="title">
                {{ __('Actividades relacionados') }}
            </x-slot>

            <ul class="grid grid-flow-col auto-cols-[40%] md:auto-cols-[30%] gap-6">
                @foreach ($activities as $activity)
                    <li>
                        @if ($activity instanceof \Trafikrak\Models\News\Event)
                            <x-testa::events.mini :event="$activity"/>
                        @elseif ($activity instanceof \Trafikrak\Models\Education\CourseModule)
                            <x-testa::course-modules.mini :module="$activity"/>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-testa::tier.horizontal-scroll>
    @endif
</div>