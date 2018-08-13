<?php

use Illuminate\Database\Seeder;

class BuysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buy = $this->buy();
        $order = $this->order($buy);
        $quotation = $this->quotation($buy,$order);
        $revert = $this->revert($buy,$quotation);
    }

    private function buy()
    {
        \App\Spent::create(['cash'=>0,'finance_id'=>1]);
        return \App\Buy::create([
            'trade_id'      => 1,
            'spent_id'      => 1,
            'user_id'       => 5
        ]);
    }

    private function order($buy)
    {
        $buy->update(['bc'=>1]);
        $order1 = \App\Order::create([
            'qt'    => 5,
            'buy_id' => $buy->id,
            'product_id' => 1
        ]);
        $order2 = \App\Order::create([
            'qt'    => 5,
            'buy_id' => $buy->id,
            'product_id' => 6
        ]);
        return compact('order1','order2');
    }

    private function quotation($buy,$order)
    {
        $q1 = \App\Quotation::create([
            'ht'            => 1000,
            'tva'           => 200,
            'ttc'           => 1200,
            'taxes'         => 0,
            'profit'        => 0,
            'freeze'        => 0,
            'selected'      => true,
            'deal_id'       => 1,
            'payment_id'    => 1,
            'buy_id'        => $buy->id,
        ]);
        $q2 = \App\Quotation::create([
            'ht'            => 3000,
            'tva'           => 600,
            'ttc'           => 3600,
            'taxes'         => 0,
            'profit'        => 0,
            'freeze'        => 0,
            'selected'      => true,
            'deal_id'       => 2,
            'payment_id'    => 1,
            'buy_id'        => $buy->id,
        ]);
        $q3 = \App\Quotation::create([
            'ht'            => 2000,
            'tva'           => 400,
            'ttc'           => 2400,
            'taxes'         => 0,
            'profit'        => 0,
            'freeze'        => 0,
            'selected'      => true,
            'deal_id'       => 3,
            'payment_id'    => 1,
            'buy_id'        => $buy->id,
        ]);
        $qp1_1 = \App\QuotationProduct::create([
            'pu'            => 100,
            'order_id'      => $order['order1']->id,
            'quotation_id'  => $q1->id
        ]);
        $qp1_2 = \App\QuotationProduct::create([
            'pu'            => 100,
            'order_id'      => $order['order2']->id,
            'quotation_id'  => $q1->id
        ]);
        $qp2_1 = \App\QuotationProduct::create([
            'pu'            => 200,
            'order_id'      => $order['order1']->id,
            'quotation_id'  => $q2->id
        ]);
        $qp2_2 = \App\QuotationProduct::create([
            'pu'            => 200,
            'order_id'      => $order['order2']->id,
            'quotation_id'  => $q2->id
        ]);
        $qp3_1 = \App\QuotationProduct::create([
            'pu'            => 300,
            'order_id'      => $order['order1']->id,
            'quotation_id'  => $q3->id
        ]);
        $qp3_2 = \App\QuotationProduct::create([
            'pu'            => 300,
            'order_id'      => $order['order2']->id,
            'quotation_id'  => $q3->id
        ]);
        $spent = \App\Spent::find(1);
        $spent->update(['cash' => 1200]);
        $spent->finance->update(['sold' => 1200]);
        $buy->update([
            'bc'=>1, 'bl'=>1, 'bill'=>1, 'store'=>1, 'delivery'=>1,
        ]);
        \App\ProductValue::create([
            'qt'    => $order['order1']->qt,
            'pu'    => $qp1_1->pu,
            'ht'    => $ht = $qp1_1->pu * $order['order1']->qt,
            'tva'   => $tva = $ht * 0.2,
            'ttc'   => $tva + $ht,
            'taxes' => 0,
            'profit'=>0,
            'freeze'=>0,
            'product_id'=> $order['order1']->product_id,
            'buy_id'    => $buy->id,
            'deal_id'   => $q1->deal_id,
            'quotation_product_id' => $qp1_1->id
        ]);
        $product = \App\Product::where('id',$order['order1']->product_id)->first();
        $product->update(['qt' => $product->qt + $order['order1']->qt]);
        \App\ProductValue::create([
            'qt'    => $order['order2']->qt,
            'pu'    => $qp1_2->pu,
            'ht'    => $ht = $qp1_2->pu * $order['order2']->qt,
            'tva'   => $tva = $ht * 0.2,
            'ttc'   => $tva + $ht,
            'taxes' => 0,
            'profit'=>0,
            'freeze'=>0,
            'product_id'=> $order['order2']->product_id,
            'buy_id'    => $buy->id,
            'deal_id'   => $q1->deal_id,
            'quotation_product_id' => $qp1_2->id
        ]);
        $product = \App\Product::where('id',$order['order2']->product_id)->first();
        $product->update(['qt' => $product->qt + $order['order2']->qt]);
        return $qp1_1;
    }

    private function revert($buy,$quotationProduct)
    {
        $revert = \App\Revert::create([
            'qt'                => 1,
            'product_value_id'  => $quotationProduct->productValue->id,
            'quotation_product_id'      => $quotationProduct->id
        ]);
        $p = \App\ProductValue::where('id',$quotationProduct->productValue->id)->first();
        $qt = $p->qt - $revert->qt;
        $ht = $p->pu * $qt;
        $tva = $ht * 0.2;
        $ttc = $ht + $tva;
        $p->update([
            'qt'=>$qt,
            'tva'=>$tva,
            'ht'=>$ht,
            'ttc'=>$ttc
        ]);
        $product = $p->product->update(['qt'=>$qt]);
        $quotationProduct->quotation->update([
            'tva'=>$tva,
            'ht'=>$ht,
            'ttc'=>$ttc
        ]);
        $quotationProduct->order->update(['qt'=>$qt]);
        $spent = $buy->spent->first();
        $spent->update([
            'cash' => $ttc
        ]);
        $spent->finance->update(['sold' => $spent->cash]);
        $buy->update(['bill'=>1]);
    }

}
