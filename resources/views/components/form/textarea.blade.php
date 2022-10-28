@props(['name', 'rows' => '3'])
<x-form.section>
    <x-form.label name="{{$name}}" />
    <textarea name="{{$name}}" id="{{$name}}" rows="{{$rows}}" class="border border-gray-200 rounded p-2 w-full" required>{{$slot ?? old($name)}}</textarea>
    <x-form.error name="{{$name}}" />
</x-form.section>