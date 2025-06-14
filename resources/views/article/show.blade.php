<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cuaca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style type="text/tailwindcss">
        @layer base {
            body {
                @apply bg-gray-50 font-sans text-gray-800;
            }
        }
    </style>
</head>

<body>

    <div class="relative h-96 bg-cover bg-center flex items-center justify-center text-white text-center"
        style="background-image: url('{{ asset('storage/' . $article->picture_article) }}'); filter: brightness(50%);">
        <a href="{{ route('dashboard') }}"
            class="fixed bottom-5 right-5 z-1000 bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-full shadow-lg transition duration-300 ease-in-out">
            <i class="fas fa-home text-2xl"></i>
        </a>
        <h1 class="text-6xl font-bold drop-shadow-lg">{{ $article->judul }}</h1>
    </div>

    <div class="max-w-screen-xl mx-auto px-4">
        <section id="article-main" class="bg-white rounded-3xl shadow-xl p-8 -mt-24 relative z-10">
            <h1 class="text-5xl text-gray-800 font-extrabold mb-8">{{ $article->judul }}</h1>
            <div id="content-article" class="text-lg leading-relaxed text-gray-700 text-justify">
                {!! $article->content !!}
            </div>
        </section>

        <div class="mt-12 mb-8">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">Baca Juga</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($recommendedArticles as $recommendedArticle)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-lg">
                        <div class="h-52 bg-cover bg-center filter brightness-50"
                            style="background-image: url('{{ asset('storage/' . $recommendedArticle->picture_article) }}');">
                        </div>
                        <div class="p-5">
                            <h5 class="text-xl font-semibold text-gray-800 mb-2">{{ $recommendedArticle->title }}</h5>
                            <p class="text-gray-700 text-base mb-4">{!! Str::limit($recommendedArticle->content, 100) !!}</p>
                            <a href="{{ route('article.show.detail', $recommendedArticle->id) }}"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>