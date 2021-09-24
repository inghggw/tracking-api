<?php

namespace App\UseCases;

use App\UseCases\Contracts\CreateTrackingPixelInterface;

class CreateTrackingPixelUsecase implements CreateTrackingPixelInterface
{
  /**
   * Create a tracking pixel
   *
   * @return array
   */
  public function handle(): array
  {
    return [];
  }
}
