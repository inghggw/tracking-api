<?php

namespace App\UseCases\Contracts;

interface UpdateTrackingPixelInterface
{
  /**
   * Update a tracking pixel
   *
   * @return array
   */
  public function handle(int $id, ?string $hash, ?int $opens): array;
}
