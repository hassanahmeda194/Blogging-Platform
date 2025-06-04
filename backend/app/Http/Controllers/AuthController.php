<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();
            if (! $user) {
                return $this->error("Invalid Credentials", [], 404);
            }
            if (! Hash::check($request->password, $user->password)) {
                return $this->error("Invalid Credentials", [], 404);
            }
            $token = $user->createToken('Bearer Token')->plainTextToken;

            return $this->success('User Login Successfully', [
                'user'  => $user,
                'token' => $token,
            ]);
        } catch (ValidationException $e) {
            return $this->validationError($e->errors());
        } catch (\Throwable $th) {
            return $this->error("Something went wrong", [$th->getMessage()], 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name'     => 'required|string',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'avatar'   => 'required|file',
            ]);
            $avatar         = $request->avatar->store('public');
            $imagePath      = 'strorage/' . $avatar;
            $hashedPassword = Hash::make($request->password);
            $user           = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $hashedPassword,
                'avatar'   => $imagePath,
                'isAdmin'  => false,
            ]);
            $token = $user->createToken('Bearer Token')->plainTextToken;
            return $this->success('User Registered And Login Successfully', [
                'user'  => $user,
                'token' => $token,
            ]);
        } catch (ValidationException $e) {
            return $this->validationError($e->errors());
        } catch (\Throwable $th) {
            return $this->error("Something went wrong", [$th->getMessage()], 500);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->success('User Logout Successfully');
    }

}
