<?php

use Illuminate\Database\Seeder;

class TradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spent and buy
        $finance = \App\Finance::find(1);
        $trade = \App\Trade::find(1);
        $user = \App\User::find(5);
        $spent = $this->createSpent($finance);
        $buy = $this->createBuy($spent,$user,$trade);
        // create Orders
        $order1 = $this->createOrder($buy,5,1);
        $order2 = $this->createOrder($buy,10,6);
        // create Quotations
        $quotation1 = $this->createQuotation($buy,1,1);
        $quotation2 = $this->createQuotation($buy,1,2);
        $quotation3 = $this->createQuotation($buy,1,3);
        $this->createQuotationProduct($order1,$quotation1,500,100,600,0,0,0);
        $this->createQuotationProduct($order2,$quotation1,600,120,720,0,0,0);
        $this->createQuotationProduct($order1,$quotation2,600,120,720,0,0,0);
        $this->createQuotationProduct($order2,$quotation2,700,140,840,0,0,0);
        $this->createQuotationProduct($order1,$quotation3,400,80,480,0,0,0);
        $this->createQuotationProduct($order2,$quotation3,600,120,720,0,0,0);

        $quotation = $this->choiseQuotation($buy);

        $this->bc($buy);
        $this->selectedQuotation($quotation);
        $this->updateBuy($buy,$quotation->deal_id);
        $this->updateSpent($spent,$quotation->ttc,0,$finance);
        $this->updateFinance($finance,($finance->sold - $spent->cash));
        $this->bl($buy);
        $this->delivery($buy);
        $this->store($buy);
        $product_value1 = $this->createProductValue($order1->qt,$quotation,0,$order1->product_id,$buy);
        $this->createProductValue($order1->qt,$quotation,1,$order1->product_id,$buy);
        $this->createRevert($product_value1,$buy,1);
        $this->updateProductValue($product_value1,1,$quotation,0);
        $this->updateOrder($order1,$buy,$product_value1->qt,$order1->product_id);
        $this->updateQuotationProduct($quotation->quotationProducts[0],$product_value1);

        $cash = $this->updateQuotation($quotation,$product_value1);
        $this->updateSpent($spent,$cash,0,$finance);
        $this->updateFinance($finance,($finance->sold + $cash));
        $this->bill($buy);
    }

    private function createSpent($finance)
    {
        return \App\Spent::create([
            'cash'          => 0,
            'freeze'        => 0,
            'finance_id'    => $finance->id
        ]);
    }

    private function updateSpent($spent, $cash, $freeze, $finance)
    {
        return $spent->update([
            'cash'          => $cash,
            'freeze'        => $freeze,
            'finance_id'    => $finance->id
        ]);
    }

    private function updateFinance($finance, $sold)
    {
        return $finance->update(['sold'=>$sold]);
    }

    private function createBuy($spent, $user, $trade)
    {
        return  \App\Buy::create([
            'bc'            => 0,
            'bl'            => 0,
            'bill'          => 0,
            'store'         => 0,
            'delivery'      => 0,
            'trade_id'      => $trade->id,
            'spent_id'      => $spent->id,
            'user_id'       => $user->id
        ]);
    }

    private function updateBuy($buy,$trade)
    {
        return $buy->update(['trade_id' => $trade]);
    }
    private function createOrder($buy, $qt,$product)
    {
        return \App\Order::create([
            'qt'                => $qt,
            'buy_id'            => $buy->id,
            'product_id'        => $product
        ]);
    }

    private function updateOrder($order,$buy,$qt,$product)
    {
        return $order->update([
            'qt'                => $qt,
            'buy_id'            => $buy->id,
            'product_id'        => $product
        ]);
    }

    private function createQuotation($buy,$payment,$deal)
    {
        return \App\Quotation::create([
            'ht'            => 0,
            'tva'           => 0,
            'ttc'           => 0,
            'taxes'         => 0,
            'profit'        => 0,
            'freeze'        => 0,
            'deal_id'       => $deal,
            'payment_id'    => $payment,
            'buy_id'        => $buy->id,
            'selected'      => false
        ]);
    }

    private function updateQuotation($quotation,$product_value)
    {
        $qp1 = $quotation->quotationProducts[0];
        $qp2 = $quotation->quotationProducts[1];
        $quotation->update([
            'ht'            => $qp1->ht + $qp2->ht,
            'tva'           => $qp1->tva + $qp2->tva,
            'ttc'           => $qp1->ttc + $qp2->ttc,
            'taxes'         => $qp1->taxes + $qp2->taxes,
            'profit'        => $qp1->profit + $qp2->profit,
            'freeze'        => $qp1->freeze + $qp2->freeze,
            'deal_id'       => $product_value->deal_id,
            'buy_id'        => $product_value->buy_id,
        ]);
        return $qp1->ttc + $qp2->ttc;
    }
    private function createQuotationProduct($order,$quotation,$ht,$tva,$ttc,$taxes,$profit,$freeze)
    {
        return \App\QuotationProduct::create([
            'ht'            => $ht,
            'tva'           => $tva,
            'ttc'           => $ttc,
            'taxes'         => $taxes,
            'profit'        => $profit,
            'freeze'        => $freeze,
            'order_id'      => $order->id,
            'quotation_id'  => $quotation->id
        ]);
    }
    private function updateQuotationProduct($quotation,$product_value)
    {
        return $quotation->update([
            'ht'            => $product_value->qt,
            'tva'           => $product_value->ht,
            'ttc'           => $product_value->ttc,
            'taxes'         => $product_value->taxes,
            'profit'        => $product_value->profit,
            'freeze'        => $product_value->freeze,
        ]);
    }
    private function choiseQuotation($buy)
    {
        return \App\Quotation::where('buy_id',$buy->id)->orderBy('ht')->first();
    }
    private function selectedQuotation(\App\Quotation $quotation)
    {
        return $quotation->update(['selected' => true]);
    }
    private function bc($buy)
    {
        return $buy->update(['bc' => 1]);
    }
    private function bl($buy)
    {
        return $buy->update(['bl' => 1]);
    }
    private function bill($buy)
    {
        return $buy->update(['bill' => 1]);
    }
    private function delivery($buy)
    {
        return $buy->update(['delivery' => true]);
    }
    private function store($buy)
    {
        return $buy->update(['store' => true]);
    }
    private function createProductValue($qt,$quotation,$nbr,$product,$buy)
    {
        return \App\ProductValue::create([
            'qt'        => $qt,
            'ht'        => $quotation->quotationProducts[$nbr]->ht,
            'tva'       => $quotation->quotationProducts[$nbr]->tva,
            'ttc'       => $quotation->quotationProducts[$nbr]->ttc,
            'taxes'     => $quotation->quotationProducts[$nbr]->ttc,
            'freeze'    => $quotation->quotationProducts[$nbr]->freeze,
            'profit'    => $quotation->quotationProducts[$nbr]->profit,
            'product_id'=> $product,
            'buy_id'    => $buy->id,
            'deal_id'   => $buy->deal_id,
        ]);
    }
    private function updateProductValue($product_value,$qt,$quotation,$nbr)
    {
        $qt = $product_value->qt - $qt;
        $ht_unit = $quotation->quotationProducts[$nbr]->ht / $product_value->qt;
        $tva_unit = $quotation->quotationProducts[$nbr]->ht / $product_value->qt;
        $ht = $ht_unit * $qt;
        $tva = $tva_unit * $qt;
        $ttc = $ht + $tva;
        return $product_value->update([
            'qt'        => $qt,
            'ht'        => $ht,
            'tva'       => $tva,
            'ttc'       => $ttc,
            'taxes'     => 0,
            'freeze'    => 0,
            'profit'    => 0,
        ]);
    }
    private function createRevert($product_value,$buy,$qt)
    {
        return \App\Revert::create([
            'qt'                => $qt,
            'product_value_id'  => $product_value->id,
            'buy_id'            => $buy->id
        ]);
    }
}