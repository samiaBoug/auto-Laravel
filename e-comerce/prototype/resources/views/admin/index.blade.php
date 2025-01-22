@extends('admin.layouts.app')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Produits</h3>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">
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
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>

                            <td>{{ $product->price }} DH</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection



@section('script')
    <script>
        $(document).ready(function () {
            $('#productsTable').DataTable();
        });
    </script>
@stop



