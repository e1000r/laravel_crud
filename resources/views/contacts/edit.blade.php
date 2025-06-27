@extends('layouts.app')

@section('title', 'Edit Contact | '.$contact->name)

@section('content')
    <h1>Edit Contact</h1>
    
    <form action="{{ route('contacts.update', $contact) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $contact->name) }}" required>
        @error('name') <div style="color:red;">{{ $message }}</div> @enderror

        <br><br>
        <label>Contact (9 digits):</label><br>
        <input type="text" name="contact" id="contact-input" value="{{ old('contact', $contact->contact) }}" maxlength="9" inputmode="numeric" pattern="\d{9}" required>
        @error('contact') <div style="color:red;">{{ $message }}</div> @enderror

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const contactInput = document.getElementById('contact-input');
                contactInput.addEventListener('input', function () {
                    this.value = this.value.replace(/\D/g, '');
                });
            });
        </script>

        <br><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $contact->email) }}" required>
        @error('email') <div style="color:red;">{{ $message }}</div> @enderror

        <br><br>
        <button type="submit">Update</button>
        <a href="{{ route('contacts.index') }}">Cancel</a>
    </form>
@endsection
