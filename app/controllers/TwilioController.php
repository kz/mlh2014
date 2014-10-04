<?php

class TwilioController extends BaseController {

    public function receive() {
        $caller_number = Input::get('From');

        $caller_user = DB::table('users')->where('phone_number', '=', $caller_number)->first();
        if (is_null($caller_user)) {
            # Return and tell the user:
            # "Your phone number is not connected with an account with us. Please register and try again."
            # https://www.twilio.com/docs/api/twiml/say
            $contents = View::make('twilio.say')->with(array('message' => 'Your phone number is not connected with an account with us. Please register and try again.'));
            $response = Response::make($contents, 200);
            $response->header('Content-Type', 'text/xml');
            return $response;
        }

        $tutor_user = DB::table('tutors')->where('matched_user_id', '=', $caller_user->id)->first();
        if (is_null($tutor_user)) {
            # Return and tell the user:
            # "You have not yet connected with a tutor. Please connect with a tutor and try again."
            # https://www.twilio.com/docs/api/twiml/say
            $contents = View::make('twilio.say')->with(array('message' => 'You have not yet connected with a tutor. Please connect with a tutor and try again.'));
            $response = Response::make($contents, 200);
            $response->header('Content-Type', 'text/xml');
            return $response;
        }
        $tutor_number = $tutor_user->phone_number;

        # Dial the number of the tutor using the Twilio number's ID.
        # https://www.twilio.com/docs/api/twiml/dial
        $contents = View::make('twilio.dial')->with(array('caller_number' => $caller_number, 'tutor_number' => $tutor_number));
        $response = Response::make($contents, 200);
        $response->header('Content-Type', 'text/xml');
        return $response;

    }

} 