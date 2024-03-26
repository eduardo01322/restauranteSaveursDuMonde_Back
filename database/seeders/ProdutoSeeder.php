<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lanches = [
            [
                'nome' => 'Burger 1',
                'preco' => 17.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burger 2',
                'preco' => 18.00,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
            [
                'nome' => 'Burger 3',
                'preco' => 18.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
            [
                'nome' => 'Burger 4',
                'preco' => 18.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
            [
                'nome' => 'Burger 5',
                'preco' => 18.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
            [
                'nome' => 'Burger 6',
                'preco' => 18.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
            [
                'nome' => 'Burger 7',
                'preco' => 18.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
            [
                'nome' => 'Burger 8',
                'preco' => 18.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
            [
                'nome' => 'Burger 9',
                'preco' => 18.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
            [
                'nome' => 'Burger 10',
                'preco' => 18.99,
                'ingredientes' => 'Hamburger de carne, bacon, queijo, pao',
                'imagem' => 'images/hamburgao.jpeg',
            ],
        ];

        foreach ($lanches as $lanche) {
            DB::table('produtos')->insert([
                'nome' => $lanche['nome'],
                'preco' => $lanche['preco'],
                'ingredientes' => $lanche['ingredientes'],
                'imagem' => $lanche['imagem'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
