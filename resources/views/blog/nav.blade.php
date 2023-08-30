{{-- nav in blog is cathegorie --}}
<nav class="nav d-flex justify-content-between">
    @foreach ($categories as $item)
        <a class="p-2 link-secondary" href="{{ url('category/'.$item->id) }}">{{ $item->name }}</a>
    @endforeach
</nav>
