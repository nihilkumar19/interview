<h1>Items</h1>

<a href="{{ route('admin.items.create') }}">Add Item</a>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Created By</th>
    <th>Action</th>
</tr>

@foreach($items as $item)
<tr>
<td>{{ $item->id }}</td>
<td>{{ $item->name }}</td>
<td>{{ $item->description }}</td>

<td>
    {{ $item->user ? $item->user->name : 'Admin Created' }}
</td>

<td>

    {{-- EDIT --}}
    <a href="{{ route('admin.items.edit',$item->id) }}">Edit</a>

    {{-- DELETE --}}
    <form method="POST"
          action="{{ route('admin.items.destroy',$item->id) }}"
          style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

</td>
</tr>
@endforeach
</table>
