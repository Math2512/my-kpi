<div class="list-group">
    <a href="{{ route('admin.clients.index') }}" class="list-group-item list-group-item-action {{ Route::is('admin.clients.index') ? 'active' : '' }}">
      Clients
    </a>
    <a href="{{ route('admin.instagrams.index') }}" class="list-group-item list-group-item-action  {{ Route::is('admin.instagrams.index') ? 'active' : '' }}">Instagram</a>
    <a href="#" class="list-group-item list-group-item-action">Ecommerce</a>
    <a href="#" class="list-group-item list-group-item-action">Analytics</a>
    <a href="#" class="list-group-item list-group-item-action">Adds</a>
    <a class="list-group-item list-group-item-action disabled">Utilisateurs</a>
</div>
