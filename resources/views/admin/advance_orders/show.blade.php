<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">订单流水号：{{ $order->no }}</h3>
        <div class="box-tools">
            <div class="btn-group float-right" style="margin-right: 10px">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td>买家：</td>
                <td>{{ $order->user->name }}</td>
            </tr>
            <tr>
                <td>支付方式：</td>
                <td>{{ $order->payment_method }}</td>
                <td>支付状态：</td>
                <td>
                    @if($order->payment_method == 'manual')
                       <b style="color: red">已付款</b>
                    @else
                        <b>未付款</b>
                    @endif
                </td>
            </tr>
            <tr>
                <td>收货地址</td>
                <td colspan="3">{{ $order->address['address'] }} {{ $order->address['zip'] }} {{ $order->address['contact_name'] }} {{ $order->address['contact_phone'] }}</td>
            </tr>
            <tr>
                <td rowspan="{{ $order->items->count() + 1 }}">商品列表</td>
                <td>商品名称</td>
                <td>单价</td>
                <td>数量</td>
            </tr>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->title }} {{ $item->productSku->title }}</td>
                    <td>￥{{ $item->price }}</td>
                    <td>{{ $item->amount }}</td>
                </tr>
            @endforeach
            <tr>
                <td>订单金额：</td>
                <td>￥{{ $order->total_amount }}</td>
                <td>发货状态：</td>
                <td>{{ \App\Models\Order::$shipStatusMap[$order->ship_status] }}</td>
            </tr>
            <!-- 订单发货开始 -->
            <!-- 如果订单未发货，展示发货表单 -->
            @if($order->ship_status === \App\Models\Order::SHIP_STATUS_PENDING)
                <!-- 加上这个判断条件 -->
                @if($order->refund_status !== \App\Models\Order::REFUND_STATUS_SUCCESS &&
                  ($order->type !== \App\Models\Order::TYPE_CROWDFUNDING ||
                    $order->items[0]->product->crowdfunding->status === \App\Models\CrowdfundingProduct::STATUS_SUCCESS))

                    <tr>
                        <td colspan="4">
                            <form action="{{ route('admin.advance_orders.pay', [$order->id]) }}" method="post" class="form-inline">
                                <!-- 别忘了 csrf token 字段 -->
                                {{ csrf_field() }}
                                @if(empty($order->payment_method))
                                    <button type="submit" class="btn btn-success" id="ship-btn" >支付</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    <!-- 在 上一个 if 的 else 前放上 endif -->
                @endif
            @else
                <!-- 否则展示物流公司和物流单号 -->
                <tr>
                    <td>物流公司：</td>
                    <td>{{ $order->ship_data['express_company'] }}</td>
                    <td>物流单号：</td>
                    <td>{{ $order->ship_data['express_no'] }}</td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>
</div>
