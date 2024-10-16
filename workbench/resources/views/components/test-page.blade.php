<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' ? $title . ' – ' : null }}Placeholder Avatars test</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="grid place-content-center min-h-screen p-8">
    <div class="grid gap-8">
        @include('nav', [
            'links' => [
                ['href' => '/', 'label' => 'Beam'],
                ['href' => 'marble', 'label' => 'Marble'],
                ['href' => 'pixel', 'label' => 'Pixel'],
            ]
        ])

        <div class="flex flex-col items-center gap-4 xl:flex-row">
            <div class="xl:w-64 text-end">
                Embedded SVG
            </div>
            {{ $embedded ?? '' }}
            
        </div>

        <div class="flex flex-col items-center gap-4 xl:flex-row">
            <div class="xl:w-64 text-end">
                Via URL
            </div>
            {{ $viaUrl ?? '' }}
        </div>
    </div>
</body>
</html>