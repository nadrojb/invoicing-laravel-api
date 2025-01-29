<?php
//
//namespace App\Exceptions;
//
//use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Throwable;
//use App\Traits\ApiResponses;
//
//
//class Handler extends ExceptionHandler
//{
//
//    use ApiResponses;
//
//    public function render($request, Throwable $e)
//    {
//
//        return $this->error([
//            'type' => get_class($e),
//            'status' => 0,
//            'message' => $e->getMessage()
//        ]);
//    }
//}
