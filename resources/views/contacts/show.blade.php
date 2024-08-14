<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>
</head>
<body>
<h1>Contact Details</h1>

<p><strong>Name:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Phone:</strong> {{ $contact->phone }}</p>
<p><strong>Address:</strong> {{ $contact->address }}</p>

<a href="{{ route('contacts.index') }}">Back to Contacts</a>
</body>
</html>
