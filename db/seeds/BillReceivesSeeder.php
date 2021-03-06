<?php

use Faker\Provider\Base;
use Phinx\Seed\AbstractSeed;

class BillReceivesSeeder extends AbstractSeed
{

    const NAMES = [
        'Salário',
        'Bico',
        'Restituição Imposto de Renda',
        'Vendas de Produtos Usados',
        'Bolsa de Valores',
        'CDI',
        'Tesouro de Direto',
        'Previdência Privada'
    ];

    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $faker->addProvider($this);
        $billReceives = $this->table('bill_receives');
        $data = [];
        foreach (range(1,20) as $value){
            $data[] = [
                    'date_launch' => $faker->date(),
                    'name' => $faker->billReceivesName(),
                    'value' => $faker->randomFloat(2, 10, 1000),
                    'user_id' => rand(1, 4),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $billReceives->insert($data)->save();
    }

    public function billReceivesName()
    {
        return Base::randomElement(self::NAMES);
    }
}
