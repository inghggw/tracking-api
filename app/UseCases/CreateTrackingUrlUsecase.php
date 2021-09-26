<?php

namespace App\UseCases;

use App\Models\TrackingUrl;
use App\UseCases\Contracts\HashUniqueInterface;
use App\UseCases\Contracts\CreateTrackingUrlInterface;

class CreateTrackingUrlUsecase implements CreateTrackingUrlInterface
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
   * Create a tracking url
   *
   * @param string $url
   * @return array
   */
  public function handle(string $url): array
  {
    $hash = $this->hashUnique->handle('url');

    $trackingUrl = new TrackingUrl;
    $trackingUrl->hash = $hash;
    $trackingUrl->url = $url;
    $trackingUrl->save();

    return $trackingUrl->toArray();
  }
}
