<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\TrackingUrl;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreTrackingUrlRequest;
use App\Http\Requests\UpdateTrackingUrlRequest;
use App\UseCases\Contracts\CreateTrackingUrlInterface;
use App\UseCases\Contracts\UpdateTrackingUrlInterface;

class TrackingUrlController extends Controller
{
  /**
   * Store a tracking Url
   *
   * @param CreateTrackingUrlInterface $createTrackingUrl
   * @return JsonResponse
   */
  public function store(
    StoreTrackingUrlRequest $request,
    CreateTrackingUrlInterface $createTrackingUrl
  ): JsonResponse {
    try {
      $data = $createTrackingUrl->handle($request->url);

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
   * Update a tracking Url
   *
   * @param UpdateTrackingUrlRequest $request
   * @param integer $id
   * @param UpdateTrackingUrlInterface $updateTrackingUrl
   * @return JsonResponse
   */
  public function update(
    UpdateTrackingUrlRequest $request,
    int $id,
    UpdateTrackingUrlInterface $updateTrackingUrl
  ): JsonResponse {
    try {
      $data = $updateTrackingUrl->handle($id, $request->url, $request->hash, $request->opens);

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
   * Delete a tracking Url
   *
   * @param integer $id
   * @return JsonResponse
   */
  public function destroy(int $id): JsonResponse
  {
    try {
      $trackingUrl = TrackingUrl::find($id);

      if ($trackingUrl) {
        $trackingUrl->delete();
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
