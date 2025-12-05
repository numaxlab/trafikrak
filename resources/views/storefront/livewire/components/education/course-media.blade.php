<div>
    @if ($attachments->isNotEmpty())
        <x-testa::tier.horizontal-scroll>
            <x-slot name="title">
                {{ __('Audiovisual') }}
            </x-slot>

            <ul class="grid grid-flow-col auto-cols-[55%] gap-6">
                @foreach ($attachments as $attachment)
                    <li>
                        <x-dynamic-component
                                :component="'testa::'.$attachment->component_namespace.'.summary'"
                                :media="$attachment->media"/>
                    </li>
                @endforeach
            </ul>
        </x-testa::tier.horizontal-scroll>
    @endif
</div>