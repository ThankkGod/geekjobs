<x-mail::message>
# Agent Account Created

Hello {{ $user->name }},

Your agent account has been created successfully.

**Email:** {{ $user->email }}

Password: {{ $password }}

<x-mail::button :url="route('login')">
    Login
</x-mail::button>



Thanks,<br>
{{ config('app.name') }}
</x-mail::message>