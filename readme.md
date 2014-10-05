## Tutor4U - An MLH Launch Hack Creation

Tutor4U is Tinder for finding Tutors. This repo contains the back-end which was hastily created during MLH Launch Hack 2014.

The front-end is an Android app which lets students find a tutor without revealing their personal information. This is achieved through Twilio integration via TwiML in the PHP backend: as the customer accepts a tutor (instead of dismissing one), they will be prompted to call a Twilio number. The customer is automatically bound to the Twilio number so that when the customer calls the number, Tutor4U will dial the tutor so both parties can communicate without revealing their phone numbers.

To improve on this app, we could spend an extra fifteen minutes implementing call recording and spending more time creating a full SMS client, perfectly achievable through TwiML.
