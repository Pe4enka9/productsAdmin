<li>{{ $childrenCategory->name }}</li>
<ul>
    @foreach($childrenCategory->categories as $childCategory)
        @include('categories.children_categories', ['childrenCategory' => $childCategory])
    @endforeach
</ul>
