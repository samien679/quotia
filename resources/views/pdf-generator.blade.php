<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Tarjous</title>

    <style>
        table,
        td,
        tr {
            border: 1px solid black;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 0px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 12px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        /* .invoice-box table tr td:nth-child(2) {
    text-align: right;
   } */

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top tabebruary 1,
        2015le td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <h1>Tarjous</h1>
                            </td>

                            <td>
                                Tarjous #{{ $quoteInfo->id }}<br />
                                Luotu: {{ $quoteInfo->created }}<br />
                                Voimassa: {{ $quoteInfo->dueDate }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="5">
                    <table>
                        <tr>
                            <td>
                                Lähettäjä:<br />
                                {{ $quoteInfo->company_name }}<br />
                                12345 Sunny Road<br />
                                Sunnyville, CA 12345
                            </td>

                            <td>
                                Vastaanottaja:<br />
                                Acme Corp.<br />
                                John Doe<br />
                                john@example.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="heading">
                <td>Nimike</td>
                <td>Määrä</td>
                <td>á-hinta</td>
                <td>Alv %</td>
                <td>Verollinen yht.</td>
            </tr>

            @foreach ($quoteItems as $quoteItem)

                <tr class="item">
                    <td>{{ $quoteItem->name1 }} {{ $quoteItem->name2 }}</td>
                    <td>{{ $quoteItem->qty }} {{ $quoteItem->unit }}</td>
                    <td>{{ $quoteItem->quote_price }} €</td>
                    <td>{{ $quoteItem->vat }} %</td>
                    <td>{{ $quoteItem->item_value_with_vat }} €</td>
                </tr>

            @endforeach


            <tr class="total">
                <td>Veroton yhteensä {{ $quoteInfo->sum_zero_vat }} €</td>
            </tr>
            <tr class="total">
                <td>Total: $385.00</td>
            </tr>
            <tr class="total">
                <td>Total: $385.00</td>
            </tr>
        </table>
    </div>
</body>

</html>
