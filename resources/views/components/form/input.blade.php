@props(['name', 'type' => 'text'])
<x-form.section>
    <x-form.label name="{{$name}}" />
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="border border-gray-400 p-2 w-full" value="{{old($name)}}" required>
    <x-form.error name="{{$name}}" />
</x-form.section>