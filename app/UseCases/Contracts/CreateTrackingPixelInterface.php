<?php

namespace App\UseCases\Contracts;

interface CreateTrackingPixelInterface
{
    /**
     * Create a tracking pixel
     *
     * @return array
     */
    public function handle(): array;
}
