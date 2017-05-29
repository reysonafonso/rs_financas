<?php

use Faker\Provider\Base;
use Phinx\Seed\AbstractSeed;

class CategoryCostsSeeder extends AbstractSeed
{

    const NAMES = [
        'Telefone',
        'Supermercado',
        'Educação',
        'Cartão',
        'IPVA',
        'Gasolina',
        'Imposto de Renda',
        'Vestuário',
        'Entretenimento',
        'Reparos'
    ];

    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $faker->addProvider($this);
        $categoriaCosts = $this->table('category_costs');
        $data = [];
        foreach (range(1,20) as $value){
            $data[] = [
                    'name' => $faker->categoryName(),
                    'user_id' => rand(1, 4),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $categoriaCosts->insert($data)->save();
    }

    public function categoryName()
    {
        return Base::randomElement(self::NAMES);
    }
}
