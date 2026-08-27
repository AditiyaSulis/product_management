<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="Product Management API",
 *     version="1.0.0",
 *     description="API Documentation for Product Management System"
 * )
 * 
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Local Server"
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
class SwaggerController extends Controller
{
    // Empty controller for Swagger annotations
}