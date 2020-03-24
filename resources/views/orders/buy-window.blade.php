<div class="box-modal">
    <div class="box-modal_close arcticmodal-close"><b>Закрыть [x]</b></div>
    Простое модальное окно {{ $id }}

    <h1>Купить "{{ $product->title }}"</h1>
    <h2>{{ $product->price }} ₽</h2>
    <p>{!! $product->description !!} </p>
    <form method="POST" action="{{ Route('product.buy', ['id' => $id]) }}" autocomplete="off">
        <table id="buy-table">
            <tr>
                <td>Имя</td><td><input type="text" name="user_name" value="{{ $user_name }}" required /></td>
            </tr>
            <tr>
                <td>E-mail</td><td><input type="email" name="user_mail" value="{{ $user_mail }}" required /></td>
            </tr>
            <tr>
                <td>Количество</td><td><input id="buy_count" type="number" step="1" value="1" min="1" max="999" name="capacity" /></td>
            </tr>
            <tr>
                <td>Итого, ₽</td><td><input type="text" id="summary" readonly /></td>
            </tr>
        </table>
        <div>
            <input type="button" value="Отмена" style="float:right;" class="arcticmodal-close" />
            <input type="submit" value="Купить" />
        </div>
        @csrf
        <input type="hidden" name="product_id" value="{{ $id }}" />
    </form>
    <script>
        var price = parseFloat({{ $product->price }});
        $('#summary').val(price);
        $('#buy_count').change(function(){
            $('#summary').val(price * $(this).val());
        });
        $('form').submit(function(e){
            var btnSubmit = $('button[type=submit]');
            btnSubmit.prop('disabled', true);
            e.preventDefault();
            $.post($(this).attr('action'), $(this).serialize(), function() {
                alert( "Заказ успешно оформлен!\nНаш менеджер свяжется с Вами в ближайшее время." );
                $.arcticmodal('close');
            }).fail(function() {
                alert('Произошла непредвиденная ошибка!\nПерезагрузите страницу или попробуйте позже.');
            })
        });
    </script>
    <style>
        #buy-table {
            width: 100%;
        }
        #buy-table tr td > input {
            width:100%;
        }
    </style>

</div>
