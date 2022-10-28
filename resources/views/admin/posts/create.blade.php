<x-layout>

    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" rows="5" />
            <x-form.section>
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}" {{old('category_id') === $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.section>
            <x-submit-button>Publish</x-submit-button>
        </form>
    </x-setting>

</x-layout>