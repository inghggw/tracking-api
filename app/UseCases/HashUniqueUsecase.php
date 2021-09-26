<?php

namespace App\UseCases;

use Illuminate\Support\Str;
use App\Models\TrackingUrl;
use App\Models\TrackingPixel;
use App\UseCases\Contracts\HashUniqueInterface;

class HashUniqueUsecase implements HashUniqueInterface
{
  /**
   * Generate hash unique and validate with models by type
   *
   * @param string $type
   * @return string
   */
  public function handle(string $type): string
  {
    $hash = Str::random(7);

    switch ($type) {
      case 'pixel':
        $exist = TrackingPixel::where('hash', $hash)->get();
        break;
      case 'url':
        $exist = TrackingUrl::where('hash', $hash)->get();
        break;
    }

    if (!$exist->isEmpty()) {
      $this->handle($type);
    }

    return $hash;
  }
}
