@extends('layouts.app')

@section('title', 'Add New Contact')

@section('content')
    <h1>Add New Contact</h1>
    
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf

        <label for="name">Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <div style="color:red;">{{ $message }}</div> @enderror

        <br><br>
        <label for="contact">Contact (9 digits):</label><br>
        <input type="text" name="contact" id="contact-input" value="{{ old('contact') }}" maxlength="9" inputmode="numeric" pattern="\d{9}" required>
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
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div style="color:red;">{{ $message }}</div> @enderror

        <br><br>
        <button type="submit">Save</button>
        <a href="{{ route('contacts.index') }}">Cancel</a>
    </form>
@endsection
