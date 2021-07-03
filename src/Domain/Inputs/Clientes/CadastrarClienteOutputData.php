<?php

namespace App\Domain\Inputs\Clientes;

class CadastrarClienteOutputData
{
    private int $clienteId;

    public function __construct(int $clienteId)
    {
        $this->clienteId = $clienteId;
    }

    public function get(): int
    {
        return $this->clienteId;
    }
}