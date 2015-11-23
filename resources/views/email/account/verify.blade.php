<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            <p>
                Thanks for creating an account at WebLeash. Please follow the link below to verify your account:<br />
                <br />
                {{ route('account.verify', [$emailAddress, $confirmationCode]) }}
            </p>

            <p style="padding-top: 16px;">
                Thank you,<br />
                The WebLeash Team
            </p>
        </div>

    </body>
</html>
