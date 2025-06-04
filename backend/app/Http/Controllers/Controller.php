    <?php
    namespace App\Http\Controllers;

    abstract class Controller
    {
        public function success($message = "", $data = [], $statusCode = 200)
        {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data'    => $data,
            ], $statusCode);
        }
        public function error($message = "", $error = [], $statusCode = 500)
        {
            return response()->json([
                'success' => false,
                'message' => $message,
                'error'   => $error,
            ], $statusCode);
        }
        public function validationError($error = [])
        {
            return $this->error("validation error", $error, 422);
        }
    }
