<?php

namespace Trafikrak\Storefront\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lunar\Base\PaymentTypeInterface;
use Lunar\Facades\CartSession;
use Lunar\Facades\Payments;
use Lunar\Models\Order;
use NumaxLab\Lunar\Redsys\RedsysPayment;

class CheckoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $cart = CartSession::current();

        if (!$cart) {
            return redirect()->route('trafikrak.storefront.homepage')->send();
        }

        $cart->meta = [
            'Tipo de pedido' => 'Pedido librería',
            'Método de pago' => __("trafikrak::global.payment_types.{$request->get('payment_type')}"),
        ];

        $cart->save();

        $order = $cart->draftOrder()->first();

        if (!$order) {
            $order = $cart->createOrder();
        }

        /** @var PaymentTypeInterface $paymentDriver */
        $paymentDriver = Payments::driver($request->get('payment_type'))
            ->cart($cart)
            ->order($order)
            ->withData([
                'config_key' => 'default',
                'url_ok' => route('trafikrak.storefront.checkout.success', $order->fingerprint),
                'url_ko' => route('trafikrak.storefront.checkout.shipping-and-payment'),
                'method' => $request->get('payment_type') === 'bizum' ? 'z' : 'C',
                'product_description' => 'Compra de libros',
            ]);

        $payment = $paymentDriver->authorize();

        if ($payment->success && $payment->paymentType === RedsysPayment::DRIVER_NAME) {
            return $paymentDriver->redirect();
        }

        if ($payment->success && $payment->paymentType === 'offline') {
            $order = Order::findOrFail($payment->orderId);

            return redirect()->route('trafikrak.storefront.checkout.success', $order->fingerprint);
        }

        return redirect()->route('trafikrak.storefront.checkout.shipping-and-payment');
    }
}
