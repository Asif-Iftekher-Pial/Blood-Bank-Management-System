<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Request</title>
</head>
<body>
        <h2>Hello there,</h2>
        <h4>{{ $donarInfo->d_name }}</h4>
        <p>You have been selected as blood group of  {{ $donarInfo->d_blood_group }} blood donar</p>
        <p>You are requested to contact with me as soon as possible for farther information of the patient</p>
        <p>Thank you!</p>
        <p style="text-decoration: underline">sincerely</p>
        <span>{{ Auth::user()->email }}</span>
</body>
</html>