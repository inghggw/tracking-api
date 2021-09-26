<?php

namespace App\UseCases\Contracts;

interface HashUniqueInterface
{
  /**
   * Generate hash unique and validate with models by type
   *
   * @param string $type
   * @return string
   */
  public function handle(string $type): string;
}
