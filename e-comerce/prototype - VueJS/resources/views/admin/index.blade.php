@extends('admin.layouts.app')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Produits</h3>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right" id="addProduct">
                Ajouter un produit
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="productsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($products as $product)
        <tr id="product-{{ $product->id }}">
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }} DH</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                <button type="button" class="btn btn-danger btn-sm btnDelete" data-id="{{ $product->id }}">
                    Supprimer
                </button>
            </td>
        </tr>
    @endforeach
</tbody>

            </table>
            <div>
            <div class="text-center">
                {{ $products->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            // Quand on clique sur le bouton "Ajouter un produit"
            $(document).on('click', '#addProduct', function (e) {
                e.preventDefault();

                // Récupère l'URL de la route 'products.create'
                let url = $(this).attr('href');

                // Effectuer une requête Ajax vers cette URL
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // Créer une boîte de dialogue avec Bootbox.js
                        bootbox.dialog({
                            title: "Créer un produit",
                            message: response
                        });

                        // Insère la réponse HTML (le formulaire de création) dans la boîte de dialogue
                        $('.createForm').html(response);
                    },
                    error: function () {
                             bootbox.alert("Impossible de charger le formulaire.");
                            }
                });
            });

            // Lors de la soumission du formulaire de création via Ajax
            // Lors de la soumission du formulaire de création via Ajax
        $(document).on('submit', '#createProductForm', function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
        type: 'POST',
        url: "{{ route('products.store') }}",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                // Ferme la boîte de dialogue
                bootbox.hideAll();

                // Ajoute dynamiquement le produit dans le tableau (si un tableau est affiché dans la page)
                $('#productsTable tbody').append(`
                    <tr id="product-${response.product.id}">
                        <td>${response.product.id}</td>
                        <td>${response.product.name}</td>
                        <td>${response.product.description || ''}</td>
                        <td>${response.product.price} DH</td>
                        <td>
                            <a href="/products/${response.product.id}/edit" class="btn btn-warning btn-sm">Modifier</a>
                            <button type="button" class="btn btn-danger btn-sm btnDelete" data-id="${response.product.id}">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                `);

                // Affiche une notification de succès
                bootbox.alert("Produit créé avec succès !");
            } else {
                // Si une erreur survient
                bootbox.alert("Erreur : Impossible de créer le produit.");
            }
        },
        error: function (xhr) {
            // Gestion des erreurs (par exemple, validation ou serveur)
            let errors = xhr.responseJSON.errors;
            let errorMessage = "Une erreur s'est produite. Vérifiez les champs.";
            if (errors) {
                errorMessage = Object.values(errors).join('<br>');
            }
            bootbox.alert(errorMessage);
                }
            });
        });

            // quand je clique sur suprimer
            $(document).on('click', '.btnDelete', function () {
    let productId = $(this).data('id'); // Récupère l'ID du produit
    let url = "{{ route('products.destroy', ':id') }}".replace(':id', productId); // Construit l'URL dynamique

    // Afficher une boîte de confirmation avec Bootbox
    bootbox.confirm("Voulez-vous vraiment supprimer ce produit ?", function (result) {
        if (result) {
            // Si l'utilisateur confirme, lance une requête AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}", // Protection CSRF
                    _method: "DELETE" // Méthode DELETE pour Laravel
                },
                success: function (response) {
                    if (response.success) {
                        // Supprime dynamiquement la ligne correspondante
                        $('#product-' + productId).fadeOut(500, function () {
                            $(this).remove();

                            // Si le tableau devient vide, afficher un message
                            if ($('#productsTable tbody tr').length === 0) {
                                $('#productsTable tbody').append(
                                    '<tr><td colspan="5" class="text-center">Aucun produit disponible.</td></tr>'
                                );
                            }
                        });

                        // Affiche une notification de succès
                        bootbox.alert({
                            message: response.message,
                            size: 'small',
                            backdrop: true
                        });
                    } else {
                        // Si "success" est false dans la réponse
                        bootbox.alert({
                            message: response.message || "Une erreur est survenue.",
                            size: 'small',
                            backdrop: true
                        });
                    }
                },
                error: function (xhr) {
                    // Gère les erreurs HTTP ou réseau
                    let message = xhr.responseJSON?.message || "Une erreur s'est produite. Veuillez réessayer.";
                    bootbox.alert({
                        message: message,
                        size: 'small',
                        backdrop: true
                    });
                }
            });
        }
    });
});



        });
    </script>
@endsection
