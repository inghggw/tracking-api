<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\TrackingPixel;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateTrackingPixelRequest;
use App\UseCases\Contracts\CreateTrackingPixelInterface;
use App\UseCases\Contracts\UpdateTrackingPixelInterface;

class TrackingPixelController extends Controller
{
  /**
   * Store a tracking pixel
   *
   * @param CreateTrackingPixelInterface $createTrackingPixel
   * @return JsonResponse
   */
  public function store(CreateTrackingPixelInterface $createTrackingPixel): JsonResponse
  {
    try {
      $data = $createTrackingPixel->handle();

      return response()->json([
        'message' => 'The resource was created successfully',
        'data' => $data,
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
   * @param UpdateTrackingPixelRequest $request
   * @param integer $id
   * @param UpdateTrackingPixelInterface $updateTrackingPixel
   * @return JsonResponse
   */
  public function update(
    UpdateTrackingPixelRequest $request,
    int $id,
    UpdateTrackingPixelInterface $updateTrackingPixel
  ): JsonResponse {
    try {
      $data = $updateTrackingPixel->handle($id, $request->hash, $request->opens);

      return response()->json([
        'message' => 'The resource was updated successfully',
        'data' => $data,
      ]);
    } catch (Exception $exception) {

      return response()->json([
        'exception' => $exception,
        'message' => $exception->getMessage(),
      ], 500);
    }
  }

  /**
   * Delete a tracking pixel
   *
   * @param integer $id
   * @return JsonResponse
   */
  public function destroy(int $id): JsonResponse
  {
    try {
      $trackingPixel = TrackingPixel::find($id);

      if ($trackingPixel) {
        $trackingPixel->delete();
        $message = 'The resource was deleted successfully';
      } else {
        $message = 'The resource no exist';
      }

      return response()->json([
        'message' => $message
      ]);
    } catch (Exception $exception) {

      return response()->json([
        'exception' => $exception,
        'message' => $exception->getMessage(),
      ], 500);
    }
  }
}
