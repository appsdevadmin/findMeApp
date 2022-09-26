<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait ResponseTrait
{

    public static function successResponse($message = 'Success', $data = null)
    {
        $res = [
            'status' => true,
            'msg' => $message
        ];
        if ($data) {
            $res['data'] = $data;
        }

        return view('user.vehicle_cover_request', $res);
//        return response()->json($res);
    }

    public static function successRedirect($to_path, $message = 'Success', $data = null, $alert_status = 'SUCCESS_ALERT')
    {
        return redirect('/'.$to_path)
            ->with([
                'alert_type' => $alert_status,
                'message' => $message,
                $data
            ]);
    }

    public static function failureResponse($error)
    {
        $response = [
            'alert_type' => 'FAILURE_ALERT',
            'message' => $error
        ];
        return back()->withInput()->withErrors($response)->with($response);
    }

    public static function validationResponse($inputs, $validator)
    {
        return back()
            ->withInput($inputs)
            ->withErrors($validator->errors()->all())
            ->with([
                'alert_type' => 'FAILURE_ALERT',
                'message' => 'Unable to validate one or more fields. Please verify and retry.'
            ]);
    }

    public static function exceptionResponse(\Exception $exception, $path = '')
    {
        report($exception);

        if ($exception instanceof \Illuminate\Database\QueryException) {
            // $message = $exception->errorInfo;
            $message = 'Error creating request [DB]. Please, contact support.';
            $meta = 'DATABASE_EXCEPTION';
        } else {
            // $message = $exception->getMessage();
            $message = 'Unable to create request [UNKN]. Please, contact support.';
            $meta = 'UNKNOWN_EXCEPTION';
        }

        //This section should be logged for debugging.
        $log = response()->json([
            'status' => 'false',
            'error' => $message,
            'file' => $exception->getFile(),
            'code' => $exception->getCode(),
            'line' => $exception->getLine(),
            'message' => "Exception in path: {$path}",
            'details' => self::getExceptionTraceAsString($exception)
        ], 500);

        activity($meta)->log($log); //Log
        return back()
            ->withInput()
            ->withErrors(
                [
                    'alert_type' => 'FAILURE_ALERT',
                    'message' => $message
                ]
            );
    }

    public static function getExceptionResponse(\Exception $exception)
    {
        report($exception);

        if ($exception instanceof \Illuminate\Database\QueryException) {
            // $message = $exception->errorInfo;
            $message = 'Error creating request [DB]. Please, contact support.';
            $meta = 'DATABASE_EXCEPTION';
        } else {
            // $message = $exception->getMessage();
            $message = 'Unable to create request [UNKN]. Please, contact support.';
            $meta = 'UNKNOWN_EXCEPTION';
        }

        return response()->json([
            'meta' => $meta,
            'error' => $message,
            'file' => $exception->getFile(),
            'code' => $exception->getCode(),
            'line' => $exception->getLine(),
            'message' => "Exception in path: SapDumpService/storeSapDumpInDB",
            'details' => self::getExceptionTraceAsString($exception)
        ]);
    }

    public static function hasDebug()
    {
        return env('APP_DEBUG', false);
    }

    private static function getExceptionTraceAsString($exception) {
        $rtn = "";
        $count = 0;
        foreach ($exception->getTrace() as $frame) {


            $args = "";
            if (isset($frame['args'])) {
                $args = array();
                foreach ($frame['args'] as $arg) {
                    if (is_string($arg)) {
                        $args[] = "'" . $arg . "'";
                    } elseif (is_array($arg)) {
                        $args[] = "Array";
                    } elseif (is_null($arg)) {
                        $args[] = 'NULL';
                    } elseif (is_bool($arg)) {
                        $args[] = ($arg) ? "true" : "false";
                    } elseif (is_object($arg)) {
                        $args[] = get_class($arg);
                    } elseif (is_resource($arg)) {
                        $args[] = get_resource_type($arg);
                    } else {
                        $args[] = $arg;
                    }
                }
                $args = join(", ", $args);
            }
            $current_file = "[internal function]";
            if(isset($frame['file']))
            {
                $current_file = $frame['file'];
            }
            $current_line = "";
            if(isset($frame['line']))
            {
                $current_line = $frame['line'];
            }
            $rtn .= sprintf( "#%s %s(%s): %s(%s)\n",
                $count,
                $current_file,
                $current_line,
                $frame['function'],
                $args );
            $count++;
        }
        return $rtn;
    }
}
