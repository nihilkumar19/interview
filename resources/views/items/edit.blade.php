<h1>Edit Item</h1>

<form action="{{ route('admin.items.update',$item->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $item->name }}">
<br>

<textarea name="description">{{ $item->description }}</textarea>
<br>

<button type="submit">Update</button>
</form>
