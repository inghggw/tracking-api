<?php

namespace App\UseCases\Contracts;

interface UpdateTrackingUrlInterface
{
  /**
   * Update a tracking url
   *
   * @param integer $id
   * @param string|null $url
   * @param string|null $hash
   * @param integer|null $opens
   * @return array
   */
  public function handle(int $id, ?string $url, ?string $hash, ?int $opens): array;
}
