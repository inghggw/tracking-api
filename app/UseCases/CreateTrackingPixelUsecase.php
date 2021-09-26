<?php

namespace App\UseCases;

use App\Models\TrackingPixel;
use App\UseCases\Contracts\HashUniqueInterface;
use App\UseCases\Contracts\CreateTrackingPixelInterface;

class CreateTrackingPixelUsecase implements CreateTrackingPixelInterface
{

  /**
   * Generate unique hash
   *
   * @var HashUniqueInterface
   */
  protected $hashUnique;

  /**
   * Dependences
   *
   * @param HashUniqueInterface $hashUniqueInterface
   */
  public function __construct(HashUniqueInterface $hashUniqueInterface)
  {
    $this->hashUnique = $hashUniqueInterface;
  }

  /**
   * Create a tracking pixel
   *
   * @return array
   */
  public function handle(): array
  {
    $hash = $this->hashUnique->handle('pixel');

    $trackingPixel = new TrackingPixel;
    $trackingPixel->hash = $hash;
    $trackingPixel->save();

    return $trackingPixel->toArray();
  }
}
