<!DOCTYPE html>
<html class= "">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src ="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        <div>

            <header class="py-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class ="text-3xl font-bold text-black">Admin</h1>
                </div>
            </header>

        </div>
        <main>
            <div>
            @yield ('body')
            </div>
        </main>
    </div>
</body>
</html>


<!-- Voor nu is deze pagina hetzelfde als de app.blade, maar deze kan dus
    veranderd worden om er anders uit te zien in admin vs public pagina -->