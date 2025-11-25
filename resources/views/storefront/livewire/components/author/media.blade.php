<div>
    @if ($attachments->isNotEmpty())
        <x-trafikrak::tier.horizontal-scroll>
            <x-slot name="title">
                {{ __('Audiovisual') }}
            </x-slot>

            <ul class="grid grid-flow-col auto-cols-[60%] lg:auto-cols-[35%] gap-6">
                @foreach ($attachments as $attachment)
                    <li>
                        <x-dynamic-component
                                :component="$attachment->component_namespace.'.summary'"
                                :media="$attachment->media"/>
                    </li>
                @endforeach
            </ul>
        </x-trafikrak::tier.horizontal-scroll>
    @endif
</div>