@component('mail::message')
<h1>{{ trans('shopping.email.hello') }}</h1>
<h3>{{ trans('shopping.email.header1') }}</h3>
<h3>{{ trans('shopping.email.header2') }}</h3>

@component('mail::button', ['url' => route('shop.getDetailOrder', $id)])
{{ trans('shopping.email.info') }}
@endcomponent

{{ trans('shopping.email.thanks') }}<br>
{{ trans('shopping.email.treeshop') }}
@endcomponent
