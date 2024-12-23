@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold text-center mb-10 text-gray-800">Liste des Articles</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($articles as $article)
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white">
                <!-- Titre de la Carte -->
                <div class="px-6 py-4 border-b">
                    <h2 class="font-bold text-xl text-gray-800">{{ $article->title }}</h2>
                </div>
                <!-- Contenu de la Carte -->
                <div class="px-6 py-4">
                    <p class="text-gray-700 text-base">
                        {{ \Illuminate\Support\Str::limit($article->content, 100, '...') }}
                    </p>
                </div>
                <!-- Pied de la Carte -->
                <div class="px-6 py-4 border-t flex justify-between items-center">
                    <a href="" 
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Lire Plus
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
