<?php

namespace Navjot\Laravel;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

/**
 * APIResponder
 *
 * (c) Navjot Singh
 * 
 * A unified JSON response formatter for APIs (Web + Mobile)
 *
 * @author Navjot
 * @link https://navjotsinghprince.com
 * @contact info@navjotsinghprince.com
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

trait ApiResponder
{
    public const SUCCESS = 'Success';
    public const FAILED = 'Failed';
    public const ALL_FIELDS_REQUIRED = 'All fields are required';
    public const SOMETHING_WRONG = 'Something went wrong!';
    public const SOMETHING_WRONG_LATER = 'Something went wrong! Please try again later';

    protected const HTTP_OK = 200;
    protected const HTTP_BAD_REQUEST = 400;
    protected const HTTP_UNAUTHORIZED = 401;
    protected const HTTP_FAILED = 402;
    protected const HTTP_FORBIDDEN = 403;
    protected const HTTP_NOT_FOUND = 404;
    protected const HTTP_CONFLICT = 409;
    protected const HTTP_UNPROCESSABLE_ENTITY = 422;
    protected const HTTP_TOO_MANY_REQUESTS = 429;

    /**
     * Return a success response.
     * The HTTP 200 OK success status response code indicates that the request has succeeded.
     * @param string $message
     * @param [int,boolean,string,array,collection,class_object] $data
     * @return JsonResponse
     */
    protected function sendSuccess(string $message = self::SUCCESS, mixed $data = null): JsonResponse
    {
        $response = [
            'status' => self::HTTP_OK,
            'message' => $message,
        ];
        $data !== null && $response['data'] = $data;
        return Response::json($response, self::HTTP_OK);
    }

    /**
     * Return a success response with a custom key/value pair.
     * Custom Key: Your custom response key.
     * Custom Value: Your custom response value.
     * @param string $message
     * @param string $key
     * @param [int,boolean,string,array,collection,class_object] $value
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendSuccessWith(string $message, string $key, mixed $value): JsonResponse
    {
        return Response::json([
            'status' => self::HTTP_OK,
            'message' => $message,
            $key => $value,
        ], self::HTTP_OK);
    }

    /**
     * Return a standard failure response.
     * This response is sent when a request conflicts with the current state of the server.
     * @param string $message
     * @param string array $data
     * @return JsonResponse
     */
    protected function sendFailure(string $message = self::FAILED, mixed $data = null): JsonResponse
    {
        $response = [
            'status' => self::HTTP_CONFLICT,
            'message' => $message,
        ];
        $data !== null && $response['data'] = $data;
        return Response::json($response, self::HTTP_CONFLICT);
    }

    /**
     * Return Validation Failure Response.
     * Unprocessable Entity The server does not want to execute it due to validation.
     * @param [string] $message
     * @param [collection] $errors
     * @return JsonResponse
     */
    protected function validationFailed(string $message = 'Validation Failed', mixed $errors = []): JsonResponse
    {
        return Response::json([
            'status' => self::HTTP_UNPROCESSABLE_ENTITY,
            'message' => $message,
            'errors' => $errors,
        ], self::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Return Not Found Response.
     * The server can not find the requested resource
     * @param [string] $message
     * @param [array] $errors
     * @return JsonResponse
     */
    protected function notFound(string $message = 'Resource not found', mixed $errors = null): JsonResponse
    {
        return Response::json([
            'status' => self::HTTP_NOT_FOUND,
            'message' => $message,
            'errors' => $errors ?? 'Not specified',
        ], self::HTTP_NOT_FOUND);
    }

    /**
     * Return Unauthorized Response
     * Although the HTTP standard specifies "unauthorized", semantically this response means "unauthenticated".
     * That is, the client must authenticate itself to get the requested response
     * @param string $message
     * @return JsonResponse
     */
    protected function unauthorized(string $message = 'Unauthorized'): JsonResponse
    {
        return Response::json([
            'status' => self::HTTP_UNAUTHORIZED,
            'message' => $message,
            'errors' => [$message],
        ], self::HTTP_UNAUTHORIZED);
    }


    /**
     * Return Forbidden Response.
     * The client does not have access rights to the content; that is, it is unauthorized, so the server is refusing to give the requested resource
     * @param [string] $message
     * @return JsonResponse
     */
    protected function forbidden(string $message = 'Forbidden'): JsonResponse
    {
        return Response::json([
            'status' => self::HTTP_FORBIDDEN,
            'message' => $message,
        ], self::HTTP_FORBIDDEN);
    }

    /**
     * Return Bad Request / Malformed Input Response.
     * The server cannot or will not process the request due to something that is perceived to be a client error (e.g., malformed request syntax, invalid request message framing, or deceptive request routing).
     * @param [string] $message
     * @return JsonResponse
     */
    protected function badRequest(string $message = 'Bad request'): JsonResponse
    {
        return Response::json([
            'status' => self::HTTP_BAD_REQUEST,
            'message' => $message,
            'errors' => [$message],
        ], self::HTTP_BAD_REQUEST);
    }
}
