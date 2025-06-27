@extends('layouts.app')

@section('title', 'Contact List')

@section('content')
    <h1>Contact List</h1>
    
    <ul>
        @foreach ($contacts as $contact)
            <li>
                <a href="{{ route('contacts.show', $contact) }}">{{ $contact->name }}</a> |
                <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
