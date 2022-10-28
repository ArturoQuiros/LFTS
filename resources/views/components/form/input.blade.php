@props(['name', 'type' => 'text'])
<x-form.section>
    <x-form.label name="{{$name}}" />
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="border border-gray-200 rounded p-2 w-full" value="{{old($name)}}" required {{$attributes}}>
    <x-form.error name="{{$name}}" />
</x-form.section>