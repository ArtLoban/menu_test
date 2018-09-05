@extends('main_layout')

@section('content')

<main role="main">
    <div class="container">

        @if(is_null($dishes))
            <div class="row justify-content-center">
                <div class="col text-center">
                    <p>Ваша корзина пока пуста</p>
                </div>
            </div>
        @else
            <div class="row">
                <div class="table-responsive">
                    <table class="table cart text-center" cellspacing="0">
                        <thead>
                        <tr class="table-active">
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th width="300">Товар</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Итого</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($dishes as $dish)
                                <tr class="">
                                    <td class="product-removal align-middle">
                                        <button class="remove-product">
                                            &times;
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <img class="" width="70" src="{{ asset(
                                                        $dish->image
                                                        ? $dish->image->path
                                                        : App\Services\ImageUploader\ImageUpload::DEFAULT_MO_IMAGE_PATH
                                                        ) }}" alt="Card image cap">
                                    </td>
                                    <td class="text-left align-middle">{{ $dish->name }}</td>
                                    <td class="align-middle">{{ $dish->price }}</td>
                                    <td class="align-middle">
                                        <div class="number product-quantity">
                                            <span class="minus btn btn-sm btn-danger">-</span>
                                            <input type="text" value="1" size="2"/>
                                            <span class="plus btn btn-sm btn-success">+</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">subtotal</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-6 text-center">
                    <div class="row justify-content-center">
                        <div class="col">
                            <h3>Сумма заказа</h3>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-3">
                            <p>Доставка</p>
                        </div>
                        <div class="col-9">
                            <span class="shipping-conditions">Бесплатная доставка при заказе от 200 грн</span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-3">
                            <p class="order-total">Итого</p>
                        </div>
                        <div class="col-9">
                            <span class="order-total">1,990 грн</span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <a href="#" class="btn btn-success cart-back-btn">Перейти к оформлению</a>
                        </div>
                    </div>

                </div>
            </div>

        @endif

        <div class="row">
            <a href="{{ route('menu') }}" class="btn btn-info cart-back-btn">Вернуться в магазин</a>
        </div>
    </div>
</main>

@endsection