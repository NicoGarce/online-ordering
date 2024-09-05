<h1>Your Order Has Been Delivered</h1>

<p>Dear {{ $orders->name }},</p>

<p>We are pleased to inform you that your order has been successfully delivered.</p>

<p>Order Details:</p>
<ul>
    <li>Order ID: {{ $orders->id }}</li>
    <li>Product Name: {{ $orders->product_name }}</li>
    <li>Quantity: {{ $orders->quantity }}</li>
    <li>Total Amount: {{ $orders->total_amount }}</li>
</ul>

<p>Thank you for shopping with us!</p>

<p>Best regards,<br>The Online Ordering Team</p>