@extends('layouts.app')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between">
        <h2 class="text-lg leading-6 font-medium text-gray-900">Liste des Fournisseurs</h2>
        <a href="{{ route('fournisseurs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Nouveau Fournisseur
        </a>
    </div>
    <div class="border-t border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produits fournis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($fournisseurs as $fournisseur)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $fournisseur->nom }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $fournisseur->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $fournisseur->telephone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $fournisseur->produits_count }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('fournisseurs.edit', $fournisseur) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                        <form action="{{ route('fournisseurs.destroy', $fournisseur) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 text-red-600 hover:text-red-900">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3">
        {{ $fournisseurs->links() }}
    </div>
</div>
@endsection 