<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        tr.bg-template th {
            background-color: black;
            color: white;
        }

        table {
            font-size: 14px;
        }

        table.table-bordered {
            border-collapse: collapse;
            border: 1px solid black;
            /* Adjust border width as needed */
        }

        table.table-bordered th,
        table.table-bordered td {
            border: 1px solid black;
            /* Adjust border width as needed */
            padding: 0px 8px;
            font-size: 14px;
            font-family: Calibri !important;
            font-weight: 700 !important;
        }

        .bold {
            font-weight: 700 !important;
        }

        .bb-1 {
            border-bottom: 1px solid black;
        }

        .bt-1 {
            border-top: 1px solid black;
        }

        .bb-blue {
            border-bottom: 1px double blue;
        }

        .title,
        .label-title {}

        .title {
            font-size: 15px !important;
            font-family: Cambria !important;
            color: blue;

        }

        .sub-title {
            font-size: 12px;
            font-family: Calibri !important;
        }

        .label-title {
            font-size: 10px;
            font-family: Calibri !important;
        }
    </style>
    @livewireStyles
</head>

<body>

    @livewire('payment-transaction.soa')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatePDF() {
            // Define the JavaScript function with a filename parameter
            console.log('print');
            var element = document.getElementById('wrapper');
            var opt = {
                pagebreak: {
                    mode: 'avoid-all',
                    before: '.page-break'
                },
                margin: .2,
                filename: 'SOA.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 1
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            console.log(element);
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>

</html>
