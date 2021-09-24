<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\UseCases\Contracts\CreateTrackingPixelInterface;

class TrackingPixelController extends Controller
{

  /**
   * Store a tracking pixel
   *
   * @return JsonResponse
   */
  public function store(CreateTrackingPixelInterface $createTrackingPixel): JsonResponse
  {
    try {
      return response()->json([
        'message' => 'The resource was created successfully',
        'data' => $createTrackingPixel->handle(),
      ]);
    } catch (Exception $exception) {
      return response()->json([
        'exception' => $exception,
        'message' => $exception->getMessage(),
      ], 500);
    }
  }

  /**
   * Update a tracking pixel
   *
   * @param Request $request
   * @param integer $id
   * @return JsonResponse
   */
  public function update(Request $request, int $id): JsonResponse
  {
    return response()->json([
      'message' => 'The resource was updated successfully',
    ]);
  }

  /**
   * Delete a tracking pixel
   *
   * @param integer $id
   * @return JsonResponse
   */
  public function delete(int $id): JsonResponse
  {
    return response()->json([
      'message' => 'The resource was deleted successfully',
    ]);
  }
}
