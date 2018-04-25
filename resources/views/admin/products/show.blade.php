@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>{{ Lang::get('menu.products') }}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>

                <tr><th width="20%"> Name </th>
                    <td> {{ $product->name }} </td>
                </tr>
                <tr><th> image </th>
                    <td><img src="/images/products/{{ $product->image }}" width="260" height="200"></td>
                </tr>
                <tr><th> withdraw message </th>
                    <td> <img src="/images/products/withdraw_message/{{ $product->withdraw_message }}" width="260" height="200"></td>
                </tr>

                <tr>
                    <th>price</th>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <th>price_original</th>
                    <td>{{ $product->price_original }}</td>
                </tr>
                <tr>
                    <th>commission</th>
                    <td>{{ $product->commission }}</td>
                </tr>
                <tr>
                    <th>sort</th>
                    <td>{{ $product->sort }}</td>
                </tr>
                <tr>
                    <th>limit_quantity</th>
                    <td>{{ $product->limit_quantity }}</td>
                </tr>
                <tr>
                    <th>virtual_membership_duration</th>
                    <td>{{ $product->virtual_membership_duration }}</td>
                </tr>
                <tr>
                    <th>specification_name1</th>
                    <td>{{ $product->specification_name1 }}</td>
                </tr>
                <tr>
                    <th>specification_category1</th>
                    <td>{{ $product->specification_category1 }}</td>
                </tr>
                <tr>
                    <th>specification_name2</th>
                    <td>{{ $product->specification_name2 }}</td>
                </tr>
                <tr>
                    <th>specification_category2</th>
                    <td>{{ $product->specification_category2 }}</td>
                </tr>
                <tr>
                    <th>specification_quantity</th>
                    <td>{{ $product->specification_quantity }}</td>
                </tr>
                <tr>
                    <th>specification_price</th>
                    <td>{{ $product->specification_price }}</td>
                </tr>
                <tr>
                    <th>image</th>
                    <td>{{ $product->image }}</td>
                </tr>
                <tr>
                    <th>status</th>
                    <td>{{ $product->status }}</td>
                </tr>
                <tr>
                    <th>detail</th>
                    <td>
                        <style>
                            img {

                                max-width: 100%;
                                max-height: 100%;
                            }
                        </style>
                        <div style="width: 60%;border: 1px solid red;">
                        {!! $product->detail !!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>repeat_purchase_amount</th>
                    <td>{{ $product->repeat_purchase_amount }}</td>
                </tr>
                <tr>
                    <th>repeat_purchase_discount</th>
                    <td>{{ $product->repeat_purchase_discount }}</td>
                </tr>
                <tr>
                    <th>shipping_price</th>
                    <td>{{ $product->shipping_price }}</td>
                </tr>
                <tr>
                    <th>shipping_fee</th>
                    <td>{{ $product->shipping_fee }}</td>
                </tr>
                <tr>
                    <th>automatically_be_canceled_aging</th>
                    <td>{{ $product->automatically_be_canceled_aging }}</td>
                </tr>
                <tr>
                    <th>one_level_distribution_commission</th>
                    <td>{{ $product->one_level_distribution_commission }}</td>
                </tr>
                <tr>
                    <th>two_level_distribution_commission</th>
                    <td>{{ $product->two_level_distribution_commission }}</td>
                </tr>
                <tr>
                    <th>three_level_distribution_commission</th>
                    <td>{{ $product->three_level_distribution_commission }}</td>
                </tr>
                <tr>
                    <th>days_automatic_goods_after_delivery</th>
                    <td>{{ $product->days_automatic_goods_after_delivery }}</td>
                </tr>
                <tr>
                    <th>days_withdraw_cash_after_goods</th>
                    <td>{{ $product->days_withdraw_cash_after_goods }}</td>
                </tr>
                <tr>
                    <th>money_can_withdraw_cash</th>
                    <td>{{ $product->money_can_withdraw_cash }}</td>
                </tr>
                <tr>
                    <th>withdraw_message</th>
                    <td>{{ $product->withdraw_message }} </td>
                </tr>
                <tr>
                    <th>daily_order_limit</th>
                    <td>{{ $product->daily_order_limit }}</td>
                </tr>
                <tr>
                    <th>commission_payment_type</th>
                    <td>{{ $product->commission_payment_type }}</td>
                </tr>
                <tr>
                    <th>total_purchase_amount_limit_as_member</th>
                    <td>{{ $product->total_purchase_amount_limit_as_member }}</td>
                </tr>
                <tr>
                    <th>purchase_as_member</th>
                    <td>{{ $product->purchase_as_member }}</td>
                </tr>
                <tr>
                    <th>pop_product</th>
                    <td>{{ $product->pop_product }}</td>
                </tr>
                <tr>
                    <th>pop_content</th>
                    <td> {!! $product->pop_content !!}</td>
                </tr>
                <tr>
                    <th>height</th>
                    <td>{{ $product->height }}</td>
                </tr>
                <tr>
                    <th>sku</th>
                    <td>{{ $product->sku }}</td>
                </tr>
                <tr>
                    <th>news_from_date</th>
                    <td>{{ $product->news_from_date }}</td>
                </tr>
                <tr>
                    <th>news_to_date</th>
                    <td>{{ $product->news_to_date }}</td>
                </tr>
                <tr>
                    <th>created_at</th>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <th>updated_at</th>
                    <td>{{ $product->updated_at }}</td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
@endsection
