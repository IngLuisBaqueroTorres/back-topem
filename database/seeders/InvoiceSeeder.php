<?php

namespace Database\Seeders;

use Hamcrest\Core\HasToString;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->truncate();
        DB::table('invoices')->insert([
            'invoiceNumber'      => '0000001',
            'emitterName'        => 'vendedor1',
            'emitterNit'         => '123456789',
            'receptorName'       => 'comprador1',
            'receptorNit'        => '987654321',
            'valueNoneVat'       => 100000,
            'vat'                => 20000,
            'totalValue'         => 120000,
            'items'              => json_encode(['description'  =>'item1',
                                     'itemQuantity'     =>5,
                                     'itemUnitValue'   =>20000,
                                     'totalAmount'  =>100000
                                    ])
        ]);
        DB::table('invoices')->insert([
            'invoiceNumber'      => '0000002',
            'emitterName'        => 'vendedor2',
            'emitterNit'         => '0123456789',
            'receptorName'       => 'comprador2',
            'receptorNit'        => '0987654321',
            'valueNoneVat'       => 200000,
            'vat'                => 30000,
            'totalValue'         => 230000,
            'items'              => json_encode(['description'  =>'item1',
                                     'itemQuantity'  =>5,
                                     'itemUnitValue' =>40000,
                                     'totalAmount'   =>200000
                                    ])
        ]);
        DB::table('invoices')->insert([
            'invoiceNumber'      => '0000003',
            'emitterName'        => 'vendedor3',
            'emitterNit'         => '852147963',
            'receptorName'       => 'comprador3',
            'receptorNit'        => '927183456',
            'valueNoneVat'       => 500000,
            'vat'                => 25570,
            'totalValue'         => 380000,
            'items'              => json_encode(['description'  =>'item1',
                                     'itemQuantity'  =>15,
                                     'itemUnitValue' =>35000,
                                     'totalAmount'   =>750000
                                    ])
        ]);
    }
}
