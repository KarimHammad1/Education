@component('mail::message')
{{-- {{-- # Inquiry From {{$data['name']}} --}}
{{$data['message']}}
Call : {{$data['phone']}}
Email: {{$data['email']}} --}}
<h1>First testtt </h1>
{{ config('app.name') }}
@endcomponent