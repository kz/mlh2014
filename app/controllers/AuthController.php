<?php

class AuthController extends BaseController {

    public function login() {
        $input_email_address = Input::get('email_address');
        $input_password = Input::get('password');

        $user = DB::table('users')->where('email_address', '=', $input_email_address)->first();

        if (is_null($user)) {
            return Response::json(array(
                'error' => true,
                'message' => 'Your email/password is incorrect. Please try again.'),
                401
            );
        }

        if ($input_password == $user->password)
        {
            return Response::json(array(
                'error' => false,
                'user' => $user),
                200
            );
        } else {
            return Response::json(array(
                    'error' => true,
                    'message' => 'Your email/password is incorrect. Please try again.'),
                401
            );
        }
    }

    public function register() {
        $phone_number = Input::get('phone_number');
        $email_address = Input::get('email_address');
        $password = Input::get('password');
        $home_address = Input::get('home_address');
        $is_tutor = Input::get('is_tutor');

        $user = new User();
        $user->phone_number = $phone_number;
        $user->email_address = $email_address;
        $user->password = $password;
        $user->home_address = $home_address;
        $user->is_tutor = $is_tutor;
        $user->save();

        if ($is_tutor = true) {
            $tutor = new Tutor();
            $tutor->user_id = $user->id;
            $tutor->degree = Input::get('degree');
            $tutor->hourly_rate = Input::get('hourly_rate');
            $tutor->experience = Input::get('experience');
            $tutor->subject = Input::get('subject');
            $tutor->save();
            return Response::json(array(
                    'error' => false,
                    'user' => $user,
                    'tutor' => $tutor),
                200
            );
        } else {
            return Response::json(array(
                    'error' => false,
                    'user' => $user),
                200
            );
        }


    }
} 