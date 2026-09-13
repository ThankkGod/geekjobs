<x-mail::message>
# Introduction

The body of your message.

Thank you for registering with Geek Jobs.

<p> Your Name is: {{ $user->name }} </p>
<p> Your Email is: {{ $user->email }} </p>

<p>Nice to have you here Candidate:  {{ $user->name }} </p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
