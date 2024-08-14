<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
<h1>Contacts</h1>

<form method="GET" action="{{ route('contacts.index') }}">
    <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<a href="{{ route('contacts.create') }}">Create New Contact</a>

<table>
    <thead>
    <tr>
        <th><a href="{{ route('contacts.index', ['sort' => 'name']) }}">Name</a></th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->address }}</td>
            <td>
                <a href="{{ route('contacts.show', $contact->id) }}">View</a>
                <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
