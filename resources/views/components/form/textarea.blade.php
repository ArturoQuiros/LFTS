@props(['name', 'rows' => '3'])
<x-form.section>
    <x-form.label name="{{$name}}" />
    <textarea name="{{$name}}" id="{{$name}}" rows="{{$rows}}" class="border border-gray-400 p-2 w-full" value="{{old($name)}}" required></textarea>
    <x-form.error name="{{$name}}" />
</x-form.section>