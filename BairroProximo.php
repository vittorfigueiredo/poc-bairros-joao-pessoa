<?php

require_once __DIR__ . "/Bairros.php";
require_once __DIR__ . "/Response.php";

class BairroProximo
{
  private string $bairroPrimeiraEntrega;
  private string $bairroSegundaEntrega;
  private array $bairros;

  function __construct($bairroPrimeiraEntrega, $bairroSegundaEntrega)
  {
    $bairros = new Bairros;
    $response = new Response;

    $this->bairroPrimeiraEntrega = $bairroPrimeiraEntrega;
    $this->bairroSegundaEntrega = $bairroSegundaEntrega;
    $this->bairros = $bairros->getBairros();

    foreach ($this->bairros as $bairro => $bairrosProximos) {
      if ($this->bairroPrimeiraEntrega === $bairro) {
        foreach ($bairrosProximos as $bairroProximo) {
          if ($this->bairroSegundaEntrega === $bairroProximo) {
            return $response::json(["match" => true]);
          }
        }

        return $response::json(["match" => false]);
      }

      continue;
    }

    return $response::json(["match" => false]);
  }
}
