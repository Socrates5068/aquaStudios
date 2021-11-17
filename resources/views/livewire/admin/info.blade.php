<div>
    <div class="container py-12">
        <x-jet-form-section submit="update" class="mb-6">
            <x-slot name="title">
                Información de la empresa
            </x-slot>
    
            <x-slot name="description">
                Actualice la información necesaria
            </x-slot>
    
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        <h2 class="mb-5 text-xl">
                        Imagen anterior
                        </h2>
                    </x-jet-label>
                    <img src="{{Storage::url($info->image)}}" alt="">
                    <p class="text-sm">
                        <input type="file" class="w-full mt-1" wire:model.defer="image"
                            accept="image/png, image/gif, image/jpeg, image/jpg, image/bmp">
                    </p>
                    <x-jet-input-error for="image" />
                </div>
    
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Dirección
                    </x-jet-label>
                    <input type="text" wire:model.defer="address" class="input input-bordered w-full mt-1">
                    <x-jet-input-error for="address" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Telefono
                    </x-jet-label>
                    <input type="text" wire:model.defer="telephone" class="input input-bordered w-full mt-1">
                    <x-jet-input-error for="telephone" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Horario
                    </x-jet-label>
                    <input type="text" wire:model.defer="schedule" class="input input-bordered w-full mt-1">
                    <x-jet-input-error for="schedule" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="flex justify-between">
                        Twitter <i class="fab fa-twitter text-2xl font-bold text-blue-700"></i>
                    </x-jet-label>
                    <input wire:model.defer="twitter" type="text" class="input input-info input-bordered w-full mt-1"> 
                    <x-jet-input-error for="twitter" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="flex justify-between">
                        Facebook <i class="fab fa-facebook text-2xl font-bold text-blue-700"></i>
                    </x-jet-label>
                    <input wire:model.defer="facebook" type="text" class="input input-info input-bordered w-full mt-1"> 
                    <x-jet-input-error for="facebook" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="flex justify-between">
                        Instagram <i class="fab fa-instagram text-2xl font-bold text-red-600"></i>
                    </x-jet-label>
                    <input wire:model.defer="instagram" type="text" class="input input-secondary input-bordered w-full mt-1"> 
                    <x-jet-input-error for="instagram" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="flex justify-between">
                        WhatsApp  <i class="fab fa-whatsapp text-2xl font-bold text-green-700"></i>
                    </x-jet-label>
                    <input wire:model.defer="whatsapp" type="text" class="input input-success input-bordered w-full mt-1"> 
                    <x-jet-input-error for="whatsapp" />
                </div>
                
            </x-slot>
    
            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    <div class="alert alert-info">
                        <div class="flex-1 h-2 items-center text-left">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="-ml-3 w-10 h-10 md:w-5 md:h-5 md:mx-2 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>                          
                          </svg> 
                          <label class="mx-2 md:ml-0">¡Información actualizada!</label>
                        </div>
                      </div>
                </x-jet-action-message>
                <x-jet-button class="mb-4 mt-3">
                    Guardar información
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    
        
    </div>
    
</div>
