<div class="box-modal">
    <div class="box-modal_close arcticmodal-close"><b>Закрыть [x]</b></div>
    Простое модальное окно {{ $id }}

    <h1>Купить "{{ $product->title }}"</h1>
    <h2>{{ $product->price }} ₽</h2>
    <p>{!! $product->description !!} </p>
    <form method="POST" action="" autocomplete="off">
        <table id="buy-table">
            <tr>
                <td>Имя</td><td><input type="text" name="user-name" value="{{ $user_name }}" required /></td>
            </tr>
            <tr>
                <td>E-mail</td><td><input type="email" name="user-mail" value="{{ $user_mail }}" required /></td>
            </tr>
            <tr>
                <td>Количество</td><td><input id="buy_count" type="number" step="1" value="1" min="1" max="999" name="user-mail" /></td>
            </tr>
            <tr>
                <td>Итого</td><td><input type="text" id="summary" readonly /></td>
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
