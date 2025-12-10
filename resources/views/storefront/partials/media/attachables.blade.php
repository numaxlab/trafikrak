@if ($media->attachments->isNotEmpty())
    <x-numaxlab-atomic::organisms.tier class="mt-10">
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                {{ __('Relacionados') }}
            </h2>
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 md:grid-cols-2 mb-10">
            @foreach ($media->attachments as $attachment)
                @if ($attachment->attachable instanceof \Testa\Models\Education\Course)
                    <li>
                        <x-testa::courses.summary :course="$attachment->attachable"/>
                    </li>
                @elseif ($attachment->attachable instanceof \Testa\Models\Education\CourseModule)
                    <li>
                        <x-testa::course-modules.activity :module="$attachment->attachable"/>
                    </li>
                @elseif ($attachment->attachable instanceof \Testa\Models\News\Event && ! $attachment->media->is_private)
                    <li>
                        <x-testa::events.summary :event="$attachment->attachable"/>
                    </li>
                @endif
            @endforeach
        </ul>
    </x-numaxlab-atomic::organisms.tier>
@endif