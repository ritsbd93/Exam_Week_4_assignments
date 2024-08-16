<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management</title>
    <!-- Add CSS here -->
</head>
<body>
<div class="container">
    <h1>Contact Management</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('contacts.index') }}">
        <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Search by name or email">
        <button type="submit">Search</button>
    </form>

    <!-- Sorting Links -->
    <div>
        <a href="{{ route('contacts.create') }}">Create New Contact</a>
    </div>
    <div>
        <a href="{{ route('contacts.index', ['sort' => 'name']) }}">Sort by Name</a>
        <a href="{{ route('contacts.index', ['sort' => 'created_at']) }}">Sort by Date</a>
    </div>

    <!-- Display Contacts -->
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->address }}</td>
                <td>
                    <a href="{{ route('contacts.show', $contact->id) }}">View</a>
                    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No contacts found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
