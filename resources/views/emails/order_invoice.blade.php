@component('mail::message')

<h2 style="text-align: center; color: #333;">Order Invoice</h2>

<p>Dear {{$order->firstName}},</p>

<p>Thank you for your recent purchase with <strong>eCommerce.com</strong>. We are pleased to confirm your order.</p>

<h3>Order Details:</h3>
<ul>
    <li>Order Number: {{$order->order_number}}</li>
    <li>Date of Purchase: {{ date('d-m-y', strtotime($order->created_at)) }}</li>
    <!-- <li>Billing Address: [Billing Address] {{$order->firstName}}</li>
    <li>Shipping Address: [Shipping Address] {{$order->firstName}}</li> -->
</ul>

<table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
        <tr>
            <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Item</th>
            <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Quantity</th>
            <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">Price</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through items and populate the table rows -->
        @foreach($order->getItem as $item)
        <tr>
            <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                {{ $item->getProduct->title }} 
                <br>
                @if(!empty($item->color_name) || (!empty($item->size_name)))
                    Color: {{ $item->color_name }}
                    br>
                    Size: {{ $item->size_name }}
                    br>
                    Size Amount: ${{ number_format($item->size_amount, 2) }}
                @endif
            </td>
            <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $item->quantity }}</td>
            <td style="padding: 8px; border-bottom: 1px solid #ddd;">${{ number_format($item->total_price, 2) }}</td>
        </tr>
        @endforeach
        <!-- Add more rows as needed -->
    </tbody>
</table>

@if(!empty($order->coupon_code))
<p>Coupon Code: <b>   {{ $order->coupon_code }} </b></p>
<p>Coupon Amount:  <b>  ${{ number_format($order->coupon_amount, 2) }} </b></p>
@endif
<p>Shipping Name: <b>   {{ $order->getShipping->name }} </b></p>
<p>Shipping Amount:  <b>  ${{ number_format($order->shipping_amount, 2) }} </b></p>
<p>Total Amount:  <b>  ${{ number_format($order->total_amount, 2) }} </b></p>
<p style="text-transform: capitalize;">Payment Method: <b>   {{ $order->payment_method }} </b></p>

<!-- <p>Please find the attached invoice for your reference. If you have any questions or concerns regarding your order or the invoice, feel free to contact us at <strong>[Your Contact Information]</strong>.</p> -->

<p>Thank you for choosing <strong>eCommerce.com</strong>. We appreciate your business.</p>


Thanks, <br>
{{ config('app.name')}}
@endcomponent