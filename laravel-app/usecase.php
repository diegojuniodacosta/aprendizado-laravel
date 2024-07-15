<?php

require_once 'vendor/autoload.php';

use App\Models\Client;

// Criar um novo cliente
Client::create(['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '1234567890']);

// Atualizar um cliente existente
$client = Client::find(1);
$client->update(['name' => 'Jane Doe']);

// Deletar um cliente
$client->delete();
