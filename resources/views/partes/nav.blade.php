<ul class="pc-navbar">
	<li class="pc-item">
		<a href="/" class="pc-link "><span class="pc-micon"><i class="fa fa-home px-1"></i></span><span class="pc-mtext">Inicio</span></a>
	</li>
	<li class="pc-item pc-caption">
		<label>Proveedores</label>
	</li>
	<li class="pc-item">
		<a href="{{ route('source.provider.index') }}" class="pc-link "><span class="pc-micon"><i class="fa fa-briefcase px-2"></i></span><span class="pc-mtext">Proveedores</span></a>
	</li>
	<li class="pc-item pc-caption">
		<label>Items</label>
	</li>		
	<li class="pc-item">
		<a href="{{ route('source.item.index') }}" class="pc-link "><span class="pc-micon"><i class="fa fa-list px-2"></i></span><span class="pc-mtext">Listado de items</span></a>
	</li>
	<li class="pc-item pc-caption">
		<label>Marketplaces</label>
	</li>		
	<li class="pc-item">
		<a href="{{ route('marketplaces.index') }}" class="pc-link "><span class="pc-micon"><i class="fa fa-university px-2"></i></span><span class="pc-mtext">Marketplaces</span></a>
	</li>
	<li class="pc-item">
		<a href="{{ route('item.recursiveJson') }}" class="pc-link "><span class="pc-micon"><i class="fa fa-university px-2"></i></span><span class="pc-mtext">Json Recursive</span></a>
	</li>

							
</ul>