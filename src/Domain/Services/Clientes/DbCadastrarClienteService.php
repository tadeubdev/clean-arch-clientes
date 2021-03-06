<?php

namespace App\Domain\Services\Clientes;

use App\Domain\Exceptions\Clientes\ClienteComEmailJaExistenteException;
use App\Domain\Exceptions\ErroAoCadastrarClienteException;
use App\Domain\Inputs\Clientes\CadastrarClienteInputData;
use App\Domain\Inputs\Clientes\CadastrarClienteOutputData;
use App\Domain\Repositories\Clientes\CadastrarClienteRepository;

class DbCadastrarClienteService implements CadastrarClienteService
{
    /**
     * @param CadastrarClienteRepository $repository
     * @param CadastrarClienteInputData $cliente
     * @return CadastrarClienteOutputData
     * @throws ClienteComEmailJaExistenteException
     * @throws ErroAoCadastrarClienteException
     */
    public function __invoke(CadastrarClienteRepository $repository, CadastrarClienteInputData $cliente): CadastrarClienteOutputData
    {
        if ($outputData = $repository->execute($cliente)) {
            return $outputData;
        }
        $message = 'Algo deu errado ao cadastrar o cliente! Tente novamente mais tarde!';
        throw new ErroAoCadastrarClienteException($message);
    }
}