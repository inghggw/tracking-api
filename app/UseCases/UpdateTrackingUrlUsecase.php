<?php

namespace App\UseCases;

use Exception;
use App\Models\TrackingUrl;
use App\UseCases\Contracts\UpdateTrackingUrlInterface;

class UpdateTrackingUrlUsecase implements UpdateTrackingUrlInterface
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
  public function handle(int $id, ?string $url, ?string $hash, ?int $opens): array
  {
    if ($hash) {
      $hashExist = TrackingUrl::where('hash', $hash)->get();

      if (!$hashExist->isEmpty()) {
        throw new Exception('The hash already exists');
      }
    }

    $trackingUrl = TrackingUrl::find($id);

    if (!$trackingUrl) {
      throw new Exception('The resource no exist');
    }

    $trackingUrl->url = $url ? $url : $trackingUrl->url;
    $trackingUrl->hash = $hash ? $hash : $trackingUrl->hash;
    $trackingUrl->opens = $opens ? $opens : $trackingUrl->opens;
    $trackingUrl->save();

    return $trackingUrl->toArray();
  }
}
