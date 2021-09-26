<?php

namespace App\UseCases;

use Exception;
use App\Models\TrackingPixel;
use App\UseCases\Contracts\UpdateTrackingPixelInterface;

class UpdateTrackingPixelUsecase implements UpdateTrackingPixelInterface
{

  /**
   * Update a tracking pixel
   *
   * @return array
   */
  public function handle(int $id, ?string $hash, ?int $opens): array
  {
    if ($hash) {
      $hashExist = TrackingPixel::where('hash', $hash)->get();

      if (!$hashExist->isEmpty()) {
        throw new Exception('The hash already exists');
      }
    }

    $trackingPixel = TrackingPixel::find($id);

    if (!$trackingPixel) {
      throw new Exception('The resource no exist');
    }

    $trackingPixel->hash = $hash ? $hash : $trackingPixel->hash;
    $trackingPixel->opens = $opens ? $opens : $trackingPixel->opens;
    $trackingPixel->save();

    return $trackingPixel->toArray();
  }
}
