@extends('layouts.app')

@section('title', 'Contact Details | '.$contact->name)

@section('content')
    <h1>Contact Details</h1>
    
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Contact:</strong> {{ $contact->formatted_contact }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Created At:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Last Updated:</strong> {{ $contact->updated_at->format('d/m/Y H:i') }}</p>

    <br>

    <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Delete this contact?')">Delete</button>
    </form>
    <br><br>
    <a href="{{ route('contacts.index') }}">← Back to List</a>
@endsection
