<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Placeholder Avatars test</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="grid place-content-center min-h-screen p-8">
    <div class="grid gap-8">
        @php $name = 'lasagna'; @endphp
        @php $colors = ['#8DA2FB', '#6875F5', '#5850EC']; @endphp
        @php $size = 400; @endphp
        @php $square = true; @endphp

        <div class="flex flex-col items-center gap-4 xl:flex-row">
            <div class="xl:w-64 text-end">
                Embedded SVG
            </div>
            <x-placeholder-avatar::beam :$colors :$size :$square :$name @class(['rounded-xl xl:rounded-3xl max-w-full h-auto']) />
        </div>


        <div class="flex flex-col items-center gap-4 xl:flex-row">
            <div class="xl:w-64 text-end">
                Via URL
            </div>
            <img src="{{ route('face', compact('colors', 'square', 'size', 'name')) }}" @class(['rounded-xl xl:rounded-3xl max-w-full h-auto']) />
        </div>
    </div>
</body>
</html>