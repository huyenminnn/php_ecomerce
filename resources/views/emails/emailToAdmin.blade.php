@component('mail::message')
<h1>{{ trans('manager.email.dear') }} {{ $name }},</h1>
<h3>{{ trans('manager.email.content') }}</h3>
<h3>{{ trans('manager.email.number') }} {{ $numberOrder }}</h3>

@component('mail::button', ['url' => route('orders.index')])
{{ trans('manager.email.button') }}
@endcomponent

{{ trans('shopping.email.thanks') }}<br>
{{ trans('shopping.email.treeshop') }}
@endcomponent
