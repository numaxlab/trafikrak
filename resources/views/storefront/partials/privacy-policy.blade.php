<div>
    <x-numaxlab-atomic::atoms.forms.checkbox
            wire:model="privacy_policy"
            name="privacy_policy"
            value="1"
            id="privacy-policy"
    >
        <span class="text-lg">{{ __('Acepto la política de privacidad') }}</span>
    </x-numaxlab-atomic::atoms.forms.checkbox>

    <x-numaxlab-atomic::atoms.forms.input-error :messages="$errors->get('privacy_policy')"/>

    <p class="at-small mt-2">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus scelerisque luctus. Donec nec nisl eget
        erat lobortis finibus. Maecenas mauris orci, volutpat sit amet tortor vel, bibendum sodales tortor. Nunc euismod
        neque et augue feugiat aliquam. Quisque sit amet felis feugiat, semper enim at, iaculis mauris.
    </p>
</div>