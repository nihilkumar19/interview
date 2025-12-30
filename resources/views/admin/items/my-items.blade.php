<h1> Items</h1>

<table border="1" cellpadding="8">
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>Created By</th>
</tr>

@foreach($items as $item)
<tr>
<td>{{ $item->id }}</td>
<td>{{ $item->name }}</td>
<td>{{ $item->description }}</td>
<td>{{ $item->user ? $item->user->name : 'Admin' }}</td>
</tr>
@endforeach
</table>
