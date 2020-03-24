<b>Оформлен заказ на товар!</b>

<div>Заказ № {{ $data->id }}</div>
<div>Продукт: {{ $product_title }}</div>
<div>Количество: {{ $data->capacity }}</div>
<div>Цена: {{ $data->price }}</div>
<div>Дата заказа: {{ $data->created_at->format('d.m.Y H:i') }}</div>
<div>Заказчик: <a href="mailto:{{ $data->user_mail }}">{{ $data->user_name }}</a></div>
