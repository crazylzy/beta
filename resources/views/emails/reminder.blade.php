@component('mail::message')
You have reminder for todos

The body of your message.

@component('mail::table')
|Due date |Title|
|:--------|:----|
@foreach($todos as $todo)
|{{ $todo['due_at']  }}|{{ $todo['title'] }}
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
