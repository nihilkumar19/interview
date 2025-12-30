<h1>Add Item</h1>

<form action="{{ route('admin.items.store') }}" method="POST">
@csrf
<input type="text" name="name" placeholder="Item Name">
<textarea name="description"></textarea>
<button type="submit">Save</button>
</form>
