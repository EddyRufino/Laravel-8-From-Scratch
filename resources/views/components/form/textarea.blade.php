@props(['name'])

<x-form.field>

    <x-form.label name="{{ $name }}" />

    <textarea name="{{ $name }}" rows="3"
              class="border border-gray-400 p-2 w-full"
              placeholder="Quick, thing of something ti say!"
              required
    >{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />

</x-form.field>
