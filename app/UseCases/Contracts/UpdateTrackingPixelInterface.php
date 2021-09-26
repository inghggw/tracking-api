<?php

namespace App\UseCases\Contracts;

interface UpdateTrackingPixelInterface
{
  /**
   * Update a tracking pixel
   *
   * @param integer $id
   * @param string|null $hash
   * @param integer|null $opens
   * @return array
   */
  public function handle(int $id, ?string $hash, ?int $opens): array;
}
