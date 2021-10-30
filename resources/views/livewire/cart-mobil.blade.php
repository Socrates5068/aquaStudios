<div>
    @role('admin')
        <a href="{{ route('admin.index')}}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">

            <span class="flex justify-center w-9">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <span class="relative inline-block pr-4">
                Administrar
            </span>
        </a>
    @endrole

    <a href="{{ route('orders.index')}}" class="py-2 px-4 text-sm flex items-center text-trueGray-500 hover:bg-orange-500 hover:text-white">

        <span class="flex justify-center w-9">
            <i class="fas fa-shopping-cart"></i>
        </span>
        <span class="relative inline-block pr-4">
            Mis reservas
        </span>
    </a>
</div>
