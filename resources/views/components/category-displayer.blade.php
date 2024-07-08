<li>
   <span class="category" style="margin-left: {{ $category->parent_id }}rem;" data-id="{{ $category->id }}">{{ $category->name }}</span>
   @if($category->children->isNotEmpty())
      <ul>
         @foreach($category->children as $child)
            @include('components.category-displayer', ['category' => $child, 'isChild' => true])
         @endforeach
      </ul>
   @endif
</li>