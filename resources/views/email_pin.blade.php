<html lang="en-US">
<head>
    <meta charset="text/html">
</head>
<body>
    Yth. Merchant Partner Bank BRI<br>
    Berikut disampaikan PIN kartu merchant anda dengan detail sebagai berikut <br><br>

    <table class="table" style="border-collapse: collapse;border: 1px solid black;color: black;">
        <tr>
            <th style="width:25px;padding: 5px;border: 1px solid black;">No</th>
        <th style="width:170px;padding: 5px;border: 1px solid black;">MID</th>
            <th style="width:170px;padding: 5px;border: 1px solid black;">No Kartu</th>
            <th style="width:100px;padding: 5px;border: 1px solid black;">PIN</th>
            <th style="width:150px;padding: 5px;border: 1px solid black;">Keterangan</th>
        </tr>
        @foreach ($cards as $key => $card)
            <tr>
                <td style="text-align:center;padding: 5px;border: 1px solid black;">{{ $key+1 }}</td>
                <td style="text-align:center;padding: 5px;border: 1px solid black;">{{ $card->mid }}</td>
            <td style="text-align:center;padding: 5px;border: 1px solid black;">{{ $card->card_number }}</td>
                <td style="text-align:center;padding: 5px;border: 1px solid black;">{{ $card->pin }}</td>
                <td style="text-align:center;padding: 5px;border: 1px solid black;">{{ $card->status }}</td>
            </tr>
        @endforeach
    </table>

    <br>
    Mohon jaga kerahasiaan PIN kartu merchant anda.
    Untuk informasi lebih lanjut, silahkan hubungi Contact Help Desk CMS BRI di (021) 57589 65/45/46/64

    <br>
    Hormat kami,
    <br>
    PT. Bank Rakyat Indonesia (Persero), Tbk
</body>
</html>
