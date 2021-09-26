<?php

namespace App\UseCases\Contracts;

interface CreateTrackingUrlInterface
{
    /**
     * Create a tracking url
     *
     * @param string $url
     * @return array
     */
    public function handle(string $url): array;
}
